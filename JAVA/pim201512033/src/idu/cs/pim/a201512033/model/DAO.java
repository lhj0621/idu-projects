package idu.cs.pim.a201512033.model;

public interface DAO {
	// file I/O 인 경우
	void open(); // 파일 읽기
	void save(); // 파일 저장
	// DB 인 경우
	// void connect(); // DB 연결
	// void disconnect(); // DB 자원 회수

}
