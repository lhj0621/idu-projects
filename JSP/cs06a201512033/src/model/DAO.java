package model;

import java.sql.Connection;
import java.sql.SQLException;

public interface DAO { //Data Access Object : ������ ���� ��ü
	Connection getConnection()throws SQLException;
}
