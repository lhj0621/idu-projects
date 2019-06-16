package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class MemberDAO extends DAOBase {
	Connection conn = null;
	Statement stmt = null;
	PreparedStatement pstmt = null;
	ResultSet rs = null;
	ArrayList<MemberDTO> dtoList = null;
	MemberDTO dto = null;
	
	public ArrayList<MemberDTO> selectListBetween(int start, int end, String sortType){
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			String query = "select * from (select rownum rnum,a_email,a_pw,a_name,a_phone,a_image,a_birthday " +
			"from (select a_email,a_pw,a_name,a_phone,a_image,a_birthday from csa_member "+sortType+") s) "+
			"a where a.rnum between " + start + " and " +end;
			rs = stmt.executeQuery(query);
			MemberDTO dto = null;
			dtoList = new ArrayList<MemberDTO>();
			while (rs.next()) {
				dto = new MemberDTO();
				dto.setEmail(rs.getString(2));
				dto.setPw(rs.getString(3));
				dto.setName(rs.getString(4));
				dto.setPhone(rs.getString(5));
				dto.setImage(rs.getString(6));
				dto.setBirthday(rs.getDate(7));

				dtoList.add(dto);
			}
			//rs.close();			stmt.close();			conn.close();
			//�޸𸮸� �Ҵ������ ������� ������ �������� ��ȯ�������.
			return dtoList;  // ��ü �߿��� ������ �������� �ִ� �� �Ǵ� ���ڵ�  
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally { //���� �߻� ���ο� ���� ���� �׻� ����
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return dtoList;
		}
	
	public MemberDTO info(MemberDTO dto) {
		MemberDTO member = null;
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			
			rs = stmt.executeQuery("select * from csa_member where " + "a_email='" + dto.getEmail() +"'"); //"' and " + "pw='" + pw + "'");
			// statement ��ü�� ������ sql ����, result set�� ��ȯ ����
		
			while (rs.next()) { // ���� ����� ���� ���ڵ尡 �����ϸ� true, �ƴϸ� false
				member = new MemberDTO();
				member.setEmail(rs.getString(1));
				member.setPw(rs.getString(2));
				member.setName(rs.getString(3));
				member.setPhone(rs.getString(4));
				member.setImage(rs.getString(5));
				member.setBirthday(rs.getDate(6));
			}

			return member;	
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return member;	
	}
	
	public int delete(MemberDTO dto) { // dto�� �Ķ���͸� ����
		int result = 0;
		try {
			conn = getConnection();
			pstmt =
					conn.prepareStatement("delete from csa_member where a_email= ?"); //���ǹ� ����
					//conn.prepareStatement("delete from ja_033_member where email='" + (String) session.getAttribute("email")+"'");
					pstmt.setString(1,dto.getEmail());
			 result = pstmt.executeUpdate(); //������ ����
			return result;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return result;
	}
	
	public int update(MemberDTO dto) { // dto�� �Ķ���͸� ����
		int result = 0;
		try {
			conn = getConnection();
			pstmt =
					conn.prepareStatement("update csa_member set  a_name=?, a_phone=?,a_image=?,a_birthday=? where a_email=?"); //���ǹ� ����
			pstmt.setString(1,dto.getName());
			pstmt.setString(2,dto.getPhone());
			pstmt.setString(3, dto.getImage());
			pstmt.setDate(4, new java.sql.Date(dto.getBirthday().getTime()));
			pstmt.setString(5,dto.getEmail());
			 result = pstmt.executeUpdate(); //������ ����
			return result;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return result;
	}
	
	public int insert(MemberDTO dto) { // dto�� �Ķ���͸� ����
		int result = 0;
		try {
			conn = getConnection();
			pstmt =
					conn.prepareStatement("insert into csa_member(a_email,a_pw,a_name,a_phone,a_image,a_birthday) values(?,?,?,?,?,?)");//���ǹ� ����
			pstmt.setString(1,dto.getEmail());
			pstmt.setString(2,dto.getPw());
			pstmt.setString(3,dto.getName());
			pstmt.setString(4,dto.getPhone());
			pstmt.setString(5, dto.getImage());
			pstmt.setDate(6, new java.sql.Date(dto.getBirthday().getTime()));
			result = pstmt.executeUpdate(); // ������ ����
			return result;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return result;
		
		
	}
	
	public MemberDTO Login(MemberDTO dto) {
		MemberDTO member = null;
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			
			rs = stmt.executeQuery("select * from csa_member where " + "a_email='" + dto.getEmail() + "' and " + "a_pw='" + dto.getPw() + "'");
			// statement ��ü�� ������ sql ����, result set�� ��ȯ ����
			while (rs.next()) { // ���� ����� ���� ���ڵ尡 �����ϸ� true, �ƴϸ� false
				member = new MemberDTO();
				member.setEmail(rs.getString(1));
				member.setPw(rs.getString(2));
				member.setName(rs.getString(3));
				member.setPhone(rs.getString(4));
				member.setImage(rs.getString(5));
				member.setBirthday(rs.getDate(6));

			}
			return member;	
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return member;	
	}
	
	public ArrayList<MemberDTO> selectList() {
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			MemberDTO dto = null;
			dtoList = new ArrayList<MemberDTO>();
			rs = stmt.executeQuery("select *  from csa_member"); // +"where id='" + id "'");
			// statement ��ü�� ������ sql ����, result set�� ��ȯ ����
			while (rs.next()) {
				dto = new MemberDTO();
				dto.setEmail(rs.getString(1));
				dto.setPw(rs.getString(2));
				dto.setName(rs.getString(3));
				dto.setPhone(rs.getString(4));
				dto.setImage(rs.getString(5));
				dto.setBirthday(rs.getDate(6));
				
				dtoList.add(dto);
			}
			//rs.close();			stmt.close();			conn.close();
			//�޸𸮸� �Ҵ������ ������� ������ �������� ��ȯ�������.
			return dtoList;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return dtoList;

	}
	
	public int selectCount() {
		int totalRows = 0;
		try {
			conn = getConnection(); // getConnection()�� DAOBase ���ǵǾ� ����.
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select count(*) from csa_member");
			if (rs.next())
				totalRows = rs.getInt(1);
			return totalRows;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return totalRows;
	}
}
