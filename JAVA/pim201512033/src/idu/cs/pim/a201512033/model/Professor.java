package idu.cs.pim.a201512033.model;

public class Professor extends Person { 
	// Person 추상클래스에 선언된 추상 메소드를 구현해야만 하기 때문에 
	// 사용법(인터페이스)을 놓치지 않고 구현할 수 있음
	private String sabun;
	private String email;
	private String dept;
	
	@Override
	String getName() {
		// TODO Auto-generated method stub
		return super.name;
	}
	@Override
	void setName(String name) {
		// TODO Auto-generated method stub
		super.name = name;
	}
	public String getSabun() {
		return sabun;
	}
	public void setSabun(String sabun) {
		this.sabun = sabun;
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
}
