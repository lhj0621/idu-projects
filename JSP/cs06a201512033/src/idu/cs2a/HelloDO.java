package idu.cs2a;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class HelloDO
 */
@WebServlet("/customer-controller.do")/* /의 레벨은WebContent와 같은 레베링ㅁ */
public class HelloDO extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public HelloDO() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("<h1>Served at:<h1> ").append(request.getContextPath());
		//response.setContentType("text/html; charset=UTF-8"); //바로 넘기는 것이 아니라서 안써도 무방함
		//HttpSession session = request.getSession();
		CustomerDTO customer = new CustomerDTO();
		String email = request.getParameter("emali");
		String password = request.getParameter("password");
		

		if(email.equals(customer.getEmali())&& 
			password.equals(customer.getPassword()))
		request.setAttribute("attr", "로그인 성공");
		//session.setAttribute(arg0, arg1);
		else
		request.setAttribute("attr", "로그인 실패 - 아이디 또는 암호 확인");
		
		request.getRequestDispatcher("result-view.jsp").forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
