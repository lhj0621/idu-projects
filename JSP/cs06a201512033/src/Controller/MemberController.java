package Controller;

import java.io.File;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Collection;

import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import javax.servlet.http.Part;

import model.MemberDAO;
import model.MemberDTO;
import model.ProductDAO;
import service.Pagination;

/**
 * Servlet implementation class MemberController
 */
@WebServlet({ "/member-list.do", "/member-login.do", "/member-register.do", "/member-update.do", "/member-delete.do","/member-info.do" })
@MultipartConfig(location = "", fileSizeThreshold = 1024 * 1024, maxFileSize = 1024 * 1024 * 5, maxRequestSize = 1024* 1024 * 5 * 5)
public class MemberController extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public MemberController() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	Connection conn = null;
	Statement stmt = null;
	PreparedStatement pstmt = null;
	ResultSet rs = null;
	ArrayList<MemberDTO> alMember = null;// new ArrayList<MemberDTO>(); // 레크드들에 대한 집합객체
	MemberDTO member = null; // 레코드와 매핑되는 객체
	HttpSession session = null;
	MemberDAO dao = new MemberDAO();
	Pagination pn = new Pagination();
	protected void process(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		request.setCharacterEncoding("UTF-8");
		session = request.getSession(); //현재 사용중인 세션 객체를 가져와서 참조변수에 배정
		//session.setMaxInactiveInterval(10); //세선 유효 시간 (초)
		/*
		try { // 드러이버 연결
			Class.forName("oracle.jdbc.OracleDriver");// ojdbc6.jar 드라이버를 메모리에 적재
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} // 파일이 없을수 있기때문에.
		try {
			conn = DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521:XE", "ja_033", "cometrue");
			// 연결정보를 이용한 연결(connection) 객체 생성
			stmt = conn.createStatement();// 연결 객체로 부터 statement 객체 생성
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		*/
		String uri = request.getRequestURI();
		int lastIndex = uri.lastIndexOf('/');
		String action = uri.substring(lastIndex + 1); // 얘부터 마지막까지 잘라와!
		// "abcdefgh".substring(3) -> defgh
		// "abcdefgh".substring(3,5) -> def
		
		if (action.equals("member-list.do")) {
			list(request, response);
		} else if (action.equals("member-login.do")) {
			login(request, response);
		} else if (action.equals("member-register.do")) {
			register(request, response);
		} else if (action.equals("member-update.do")) {
			update(request, response);
		} else if (action.equals("member-delete.do")) {
			delete(request, response);
		}else if (action.equals("member-info.do")) {
			info(request, response);
		} else
			;
	}
	
	private void info(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		String email = (String)session.getAttribute("email");
		String pw = request.getParameter("pw");
		
		MemberDTO dto = new MemberDTO();
		dto.setEmail(email);
		dto.setPw(pw);
		member = dao.info(dto);
		
		if (member != null) {
			request.setAttribute("name", member.getName());
			request.setAttribute("phone", member.getPhone());
			request.setAttribute("birthday", member.getBirthday());
			request.setAttribute("image", member.getImage());
			request.getRequestDispatcher("customer-update.jsp").forward(request, response);
		} else
			request.getRequestDispatcher("login-fail.jsp").forward(request, response);
	}

	private void delete(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		
		String email = request.getParameter("email");
		//insert into ja_033_member"+" values(?,?,?,?)
		//물음표가 4개면 (email,pw,name,phone)생략가능
		member = new MemberDTO();
		member.setEmail(email);

		int result = dao.delete(member); //쿼리문 실행
		
		if(result>=1) {//회원탈퇴 성공
			request.setAttribute("message","회원 탈퇴 작업");
			request.getRequestDispatcher("success.jsp").forward(request, response);
		}else
			response.sendRedirect("delete-fail.jsp");
	
	}
	private void update(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		Collection<Part> parts = request.getParts();
		for (Part part : parts) {
			partName = part.getName();
			if (part.getContentType() != null) {
				partValue = getFileName(part);
				System.out.println(partValue);
				if (partValue != null && !partValue.isEmpty()) {
					String absolutePath = getServletContext().getRealPath("/files");
					part.write(absolutePath + File.separator + partValue);
				}
			} else {
				partValue = request.getParameter(partName);
			}
			request.setAttribute(partName, partValue);
		}

		
		member = new MemberDTO();
		member.setEmail(request.getParameter("email"));
		member.setPw(request.getParameter("pw"));
		member.setName(request.getParameter("name"));
		member.setPhone(request.getParameter("phone"));
		String file = (String) request.getAttribute("image");
		if(file.length()>1)
		member.setImage((String) request.getAttribute("image"));
		else{
		member.setImage((String) request.getAttribute("image2"));
		}
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-M-dd");
		try {
			member.setBirthday(sdf.parse(request.getParameter("birthday")));
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		
		int result = dao.update(member);
		
		if(result>=1) {//등록성공
			request.setAttribute("name",request.getParameter("email"));
			request.getRequestDispatcher("update-success.jsp").forward(request, response);
		}else
			request.getRequestDispatcher("update-fail.jsp").forward(request, response);
	
	}
	private String getFileName(Part part) { // 헤더 파싱
    	String contentDispositionHeader = part.getHeader("content-disposition");
    	String[] splitedContentDisposition = contentDispositionHeader.split(";"); //
    	for (String cd : splitedContentDisposition ) {
	    	if (cd.trim().startsWith("filename")) {
	    		return cd.substring(cd.indexOf('=') + 1).trim().replace("\"", ""); //\기호 뒤에있는 것을 짤라와
	    	}
    	}
    	return null;
    }
	private String partName = null;
	private String partValue = null;
	
	private void register(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		Collection<Part> parts = request.getParts();
		for (Part part : parts) {
			partName = part.getName();
			if (part.getContentType() != null) {
				partValue = getFileName(part);
				System.out.println(partValue);
				if (partValue != null && !partValue.isEmpty()) {
					String absolutePath = getServletContext().getRealPath("/files");
					part.write(absolutePath + File.separator + partValue);
				}
			} else {
				partValue = request.getParameter(partName);
			}
			request.setAttribute(partName, partValue);
		}
		member = new MemberDTO();
		member.setEmail(request.getParameter("email"));
		member.setPw(request.getParameter("pw"));
		member.setName(request.getParameter("name"));
		member.setPhone(request.getParameter("phone"));
		member.setImage((String) request.getAttribute("image"));
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-M-dd");
		try {
			member.setBirthday(sdf.parse(request.getParameter("birthday")));
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		int result = dao.insert(member);
		if(result>=1) {//등록성공
			request.setAttribute("name",request.getParameter("email"));
			request.getRequestDispatcher("register-success.jsp").forward(request, response);
		}else
			request.getRequestDispatcher("register-fail.jsp").forward(request, response);
	
	}

	private void login(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		String email = request.getParameter("email");
		String pw = request.getParameter("pw");

		MemberDTO dto = new MemberDTO();
		dto.setEmail(email);
		dto.setPw(pw);
		
		member = dao.Login(dto);
		if (member != null) {
			request.setAttribute("name", member.getName());
			session.setAttribute("email",member.getEmail());
			session.setAttribute("phone",member.getPhone());
			request.getRequestDispatcher("login-success.jsp").forward(request, response);
		} else
			request.getRequestDispatcher("login-fail.jsp").forward(request, response);
	}

	private void list(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		System.out.println(request.getParameter("type"));
		System.out.println(request.getParameter("sortType"));
		int totalRows = 0;// 전체 상품수, 레코드 or 행의 수
		totalRows = dao.selectCount();
		int rowsPerPage = 3; // 한 페이지에 나타나는 사품 수
		int paginationPerPage = 2;// 한 페이지에 나타나는 페이지 번호 수
		int pageNum = 1;
		if(request.getParameter("pageNum") != null) {
			pageNum = Integer.parseInt(request.getParameter("pageNum")); //요청한 펭지 번호 수
			if(pageNum <= 0)
				pageNum = 1;
		}
		pn.processPaging(totalRows, pageNum, rowsPerPage, paginationPerPage);
		if((alMember = dao.selectListBetween(pn.getStartRow(),pn.getEndRow(),request.getParameter("sortType"))) != null) {
		//if((alMember = dao.selectList()) != null) {
		request.setAttribute("list", alMember);
		request.setAttribute("pagination",pn);
		request.setAttribute("type", request.getParameter("type"));
		request.setAttribute("sortType", request.getParameter("sortType"));
		request.getRequestDispatcher("member-list.jsp").forward(request, response);
		}else {
			request.getRequestDispatcher("fail.jsp").forward(request, response);
		}
	}

	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		try {
			process(request, response);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		try {
			process(request, response);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
