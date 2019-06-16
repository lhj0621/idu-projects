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

import model.ProductDAO;
import model.ProductDTO;
import service.Pagination;

/**
 * Servlet implementation class ProductController
 */
@WebServlet({ "/ProductController", "/product-register.do" ,"/product-list.do","/product-info.do" ,"/product-update.do","/product-detail.do","/product-delete.do"})
@MultipartConfig(location = "", fileSizeThreshold = 1024 * 1024, maxFileSize = 1024 * 1024 * 5, maxRequestSize = 1024
		* 1024 * 5 * 5) // 1024*1024 (1�ް�)������ �����ϰڴ�

public class ProductController extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public ProductController() {
		super();
		// TODO Auto-generated constructor stub
	}

	Connection conn = null;
	Statement stmt = null;
	PreparedStatement pstmt = null;
	ResultSet rs = null;
	ArrayList<ProductDTO> dtoList = null;// new ArrayList<MemberDTO>(); // ��ũ��鿡 ���� ���հ�ü
	ProductDTO dto = null; // ���ڵ�� ���εǴ� ��ü
	HttpSession session = null;
	ProductDAO dao = new ProductDAO();
	Pagination pn = new Pagination();
	protected void process(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		// TODO Auto-generated method stub
		request.setCharacterEncoding("UTF-8");
		session = request.getSession(); // ���� ������� ���� ��ü�� �����ͼ� ���������� ����
		// session.setMaxInactiveInterval(10); //���� ��ȿ �ð� (��)
		
		String uri = request.getRequestURI();
		int lastIndex = uri.lastIndexOf('/');
		String action = uri.substring(lastIndex + 1); // ����� ���������� �߶��!
		if (action.equals("product-register.do"))
			register(request, response);
		else if(action.equals("product-list.do"))
			list(request, response);	
		else if(action.equals("product-info.do"))
			info(request, response);// ���� ���� ��ȸ
		else if(action.equals("product-update.do"))
				update(request, response);
		else if(action.equals("product-detail.do"))
			detail(request, response);
		else if(action.equals("product-delete.do"))
			delete(request, response);
		else
			;
	}
	protected void delete(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		System.out.println(Integer.parseInt(request.getParameter("pno")));
		dto = new ProductDTO();
		dto.setPno(Integer.parseInt(request.getParameter("pno")));
		
		int result = dao.delete(dto);
		if (result >= 1) {// ���� ����
			request.setAttribute("message","��ǰ ���� ���� �۾�");
			request.getRequestDispatcher("success.jsp").forward(request, response);
		} else
			request.getRequestDispatcher("fail.jsp").forward(request, response);
	}
	protected void detail(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		ProductDTO p = new ProductDTO();
		p.setPno(Integer.parseInt(request.getParameter("pno")));
		dto = dao.selectOne(p);	
		if(dto != null) {
		request.setAttribute("product", dto);
		request.getRequestDispatcher("product-detail.jsp").forward(request, response);
		} else {
			request.getRequestDispatcher("fail.jsp").forward(request, response);
		}
	}
	protected void update(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		Collection<Part> parts = request.getParts();
		for (Part part : parts) {
			partName = part.getName();
			if (part.getContentType() != null) {
				partValue = getFileName(part);
				if (partValue != null && !partValue.isEmpty()) {
					String absolutePath = getServletContext().getRealPath("/files");
					part.write(absolutePath + File.separator + partValue);
				}
			} else {
				partValue = request.getParameter(partName);
			}
			request.setAttribute(partName, partValue);
		}
		
		dto = new ProductDTO();
		dto.setPno(Integer.parseInt(request.getParameter("pno")));
		dto.setName(request.getParameter("name"));
		dto.setPrice(Integer.parseInt(request.getParameter("price")));
		dto.setCno(request.getParameter("cno"));
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-M-dd");
		try {
			dto.setRegdate(sdf.parse(request.getParameter("regdate")));
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		String file = (String) request.getAttribute("image");
		if(file.length()>1)
		dto.setImage((String) request.getAttribute("image"));
		else{
		dto.setImage((String) request.getAttribute("image2"));
		}
		int result = dao.update(dto);
		if (result >= 1) {// ���� ����
			request.setAttribute("message","��ǰ ���� ���� �۾�");
			request.getRequestDispatcher("success.jsp").forward(request, response);
		} else
			request.getRequestDispatcher("fail.jsp").forward(request, response);
	}
	protected void info(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		ProductDTO p = new ProductDTO();
		p.setPno(Integer.parseInt(request.getParameter("pno")));
		dto = dao.selectOne(p);	
		//System.out.println(dto.getImage());
		if(dto != null) {
		request.setAttribute("product", dto);

		request.getRequestDispatcher("product-update.jsp").forward(request, response);
		} else {
			request.getRequestDispatcher("fail.jsp").forward(request, response);
		}
	}
	protected void list(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		//dtoList = new ArrayList<ProductDTO>();
		System.out.println(request.getParameter("sortType"));
		int totalRows = 0;// ��ü ��ǰ��, ���ڵ� or ���� ��
		totalRows = dao.selectCount();
		int rowsPerPage = 3; // �� �������� ��Ÿ���� ��ǰ ��
		int paginationPerPage = 2;// �� �������� ��Ÿ���� ������ ��ȣ ��
		int pageNum = 1;
		if(request.getParameter("pageNum") != null) {
			pageNum = Integer.parseInt(request.getParameter("pageNum")); //��û�� ���� ��ȣ ��
			if(pageNum <= 0)
				pageNum = 1;
		}
		pn.processPaging(totalRows, pageNum, rowsPerPage, paginationPerPage);
		if((dtoList = dao.selectListBetween(pn.getStartRow(),pn.getEndRow(),request.getParameter("sortType"))) != null) {
		
		//if((dtoList = dao.selectList()) != null) {
		request.setAttribute("productList", dtoList);
		request.setAttribute("pagination",pn);

		request.setAttribute("sortType", request.getParameter("sortType"));
		request.getRequestDispatcher("product-list.jsp").forward(request, response);
		} else {
			request.getRequestDispatcher("fail.jsp").forward(request, response);
		}
	}
	
	
	private String getFileName(Part part) { // ��� �Ľ�
    	String contentDispositionHeader = part.getHeader("content-disposition");
    	String[] splitedContentDisposition = contentDispositionHeader.split(";"); //
    	for (String cd : splitedContentDisposition ) {
	    	if (cd.trim().startsWith("filename")) {
	    		return cd.substring(cd.indexOf('=') + 1).trim().replace("\"", ""); //\��ȣ �ڿ��ִ� ���� ©���
	    	}
    	}
    	return null;
    }

	private String partName = null;
	private String partValue = null;

	protected void register(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
		// TODO Auto-generated method stub

		Collection<Part> parts = request.getParts();
		for (Part part : parts) {
			partName = part.getName();
			if (part.getContentType() != null) {
				partValue = getFileName(part);
				if (partValue != null && !partValue.isEmpty()) {
					String absolutePath = getServletContext().getRealPath("/files");
					part.write(absolutePath + File.separator + partValue);
				}
			} else {
				partValue = request.getParameter(partName);
			}
			request.setAttribute(partName, partValue);
		}
		
		dto = new ProductDTO();
		dto.setName(request.getParameter("name"));
		dto.setPrice(Integer.parseInt(request.getParameter("price")));
		dto.setCno(request.getParameter("cno"));
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-M-dd");
		try {
			dto.setRegdate(sdf.parse(request.getParameter("regdate")));
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		dto.setImage((String) request.getAttribute("image"));
		

		int result = dao.insert(dto);
		if (result >= 1) {// ��ϼ���
			request.setAttribute("name", request.getParameter("name"));
			request.getRequestDispatcher("register-success.jsp").forward(request, response);
		} else
			request.getRequestDispatcher("register-fail.jsp").forward(request, response);

		/*
		System.out.println(request.getParameter("name"));
		System.out.println(request.getParameter("image"));
		System.out.println(request.getAttribute("name"));
		System.out.println(request.getAttribute("image"));
		*/
	}

	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		try {
			process(request, response);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
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
