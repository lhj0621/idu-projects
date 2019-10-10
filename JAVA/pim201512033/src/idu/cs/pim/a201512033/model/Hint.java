package idu.cs.pim.a201512033.model;

public class Hint extends Person implements Comparable<Hint> { 
	// DTO : Data Transfer Object (데이터 전송 객체)
	// DB Table의  Record와 Mapping을 함 (Set of Fields)
	// MVC 모델에서 Model은 데이터 저장, 상태 저장, 비지니스 처리를 담당하고, 
	// DTO와 DAO(Data Access Object)로 구성
	private String hakbun; // 유일키(primary key)
	private String email;
	private String dept;
	
	@Override
	public String getName() {
		// TODO Auto-generated method stub		
		return super.name;
	}

	@Override
	public void setName(String name) {
		// TODO Auto-generated method stub
		super.name = name;
	}

	public String getHakbun() {
		return hakbun;
	}

	public void setHakbun(String hakbun) {
		this.hakbun = hakbun;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getDept() {
		return dept;
	}

	public void setDept(String dept) {
		this.dept = dept;
	}

	@Override
	public int compareTo(Hint o) {
		// TODO Auto-generated method stub
		return this.getName().compareTo(o.getName());
	}
	
	
}
