package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.ArrayList;

public class ProductDAO extends DAOBase {
	Connection conn = null;
	Statement stmt = null;
	PreparedStatement pstmt = null;
	ResultSet rs = null;
	ArrayList<ProductDTO> dtoList = null;
	ProductDTO dto = null;
	
	public int delete(ProductDTO dto) {
		int result = 0;
		try {
			conn = getConnection();
			pstmt = conn.prepareStatement(
					"delete from csa_product where pno = ?"); // ���ǹ�
			pstmt.setInt(1, dto.getPno());
			result = pstmt.executeUpdate(); // ������ ����
			return result;
		}catch (SQLException e) { //SQLException�� �߻��� ��� ����
			e.printStackTrace();
		} finally { //���� �߻� ���ο� ���� ���� �׻� ����
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return result;
	}
	
	public int update(ProductDTO dto) {
		int result = 0;
		try {
			conn = getConnection();
			pstmt = conn.prepareStatement(
					"update csa_product set name=?, price=?, Cno=?, regdate=?, image=? where pno = ?"); // ���ǹ�

			pstmt.setString(1, dto.getName());
			pstmt.setInt(2, dto.getPrice());
			pstmt.setString(3, dto.getCno());
			pstmt.setDate(4, new java.sql.Date(dto.getRegdate().getTime()));
			pstmt.setString(5, dto.getImage());
			pstmt.setInt(6, dto.getPno());

			result = pstmt.executeUpdate(); // ������ ����
			return result;
		}catch (SQLException e) { //SQLException�� �߻��� ��� ����
			e.printStackTrace();
		} finally { //���� �߻� ���ο� ���� ���� �׻� ����
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return result;
	}
	
	public ProductDTO selectOne(ProductDTO p) {
		try {
			conn = getConnection(); // getConnection()�� DAOBase ���ǵǾ� ����.
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select * from csa_product where pno="+p.getPno());
			if (rs.next()) {
				dto = new ProductDTO();
				dto.setPno(rs.getInt(1));
				dto.setName(rs.getString(2));
				dto.setPrice(rs.getInt(3));
				dto.setCno(rs.getString(4));
				dto.setRegdate(rs.getDate(7));
				dto.setImage(rs.getString(8));
			}
			return dto;
		} catch (SQLException e) { //SQLException�� �߻��� ��� ����
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally { //���� �߻� ���ο� ���� ���� �׻� ����
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return dto;
	}
	
	public ArrayList<ProductDTO> selectListBetween(int start, int end, String sortType){
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			String query = "select *from (select rownum rnum,pno,name,price,cno,regdate,image " +
			"from (select pno,name,price, cno, regdate, image from csa_product "+sortType+") s) "+
			"a where a.rnum between " + start + " and " +end;
			rs = stmt.executeQuery(query);
			ProductDTO dto = null;
			dtoList = new ArrayList<ProductDTO>();
			while (rs.next()) {
				dto = new ProductDTO();
				dto.setPno(rs.getInt(2));
				dto.setName(rs.getString(3)); //rs.getString("name")
				dto.setPrice(rs.getInt(4));
				dto.setCno(rs.getString(5));
				dto.setRegdate(rs.getDate(6));
				dto.setImage(rs.getString(7));
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
	
	
	public int insert(ProductDTO dto) { // dto�� �Ķ���͸� ����
		int result = 0;
		try {
			conn = getConnection();
			pstmt = conn.prepareStatement(
					"insert into csa_product(pno, name, price, cno, regdate,image)" +
			" values(p_seq.nextval,?,?,?,?,?)"); // ���ǹ�

			pstmt.setString(1, dto.getName());
			pstmt.setInt(2, dto.getPrice());
			pstmt.setString(3, dto.getCno());
			//java.utll.Date <-> java.sql.Date ��ȯ
			pstmt.setDate(4, new java.sql.Date(dto.getRegdate().getTime()));
			pstmt.setString(5, dto.getImage());

			result = pstmt.executeUpdate(); // ������ ����
			return result;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return result;
		
		
	}
	public ArrayList<ProductDTO> selectList() {
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select pno, name, price, cno, image from csa_product"); // +"where id='" + id
																								// "'");
			// statement ��ü�� ������ sql ����, result set�� ��ȯ ����
			dtoList = new ArrayList<ProductDTO>();
			while (rs.next()) {
				dto = new ProductDTO();
				dto.setPno(rs.getInt(1));
				dto.setName(rs.getString(2));
				dto.setPrice(rs.getInt(3));
				dto.setCno(rs.getString(4));
				dto.setImage(rs.getString(5));
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
			rs = stmt.executeQuery("select count(*) from csa_product");
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
