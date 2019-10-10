package idu.cs2a;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class SendRedirect
 */
@WebServlet({ "/SendRedirect", "/send-redirect.do" }) //2���϶��� �߰�ȣ ���� �޸��� ����
public class SendRedirect extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SendRedirect() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		CustomerDTO customer = new CustomerDTO();
		String email = request.getParameter("emali");
		String password = request.getParameter("password");
		

		if(email.equals(customer.getEmali())&& 
			password.equals(customer.getPassword()))
		request.setAttribute("attr", "�α��� ����");
		//session.setAttribute(arg0, arg1);
		else
		request.setAttribute("attr", "�α��� ���� - ���̵� �Ǵ� ��ȣ Ȯ��");
		
		response.sendRedirect("result-view.jsp");
		
	
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
