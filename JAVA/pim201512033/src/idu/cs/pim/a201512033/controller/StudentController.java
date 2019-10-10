package idu.cs.pim.a201512033.controller;

import java.util.ArrayList;
import java.util.Scanner;

import idu.cs.pim.a201512033.model.Student;
import idu.cs.pim.a201512033.model.StudentDAO;
import idu.cs.pim.a201512033.view.StudentView;

public class StudentController implements Controller {
	StudentDAO studentDAO = new StudentDAO();
	Student student = null; // 참조변수는 있지만 참고하는 객체가 null(참조하는 객체 없음) 상태임
	Scanner sc = null;

	@Override
	public void process(String command) {
		// TODO Auto-generated method stub
		switch (command) {
		case "register":
			register();
			break;
		case "list":
			list();
			break;
		case "update":
			update();
			break;
		case "delete":
			delete();
			break;
		case "listAll":
			listAll();
			break;
		case "namesort":
			namesort();
			break;
		case "gradesort":
			gradesort();
			break;
		case "ALLread":
			ALLread();
			break;
		case "open":
			open();
			break;
		case "save":
			save();
			break;
		}
	}

	StudentView studentView = new StudentView(); // 인스턴스 변수, 멤버 필드

	private void ALLread() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.println("조회할 카테고리는 선택해주세요(중족조회가능)\n 1.이름  2.학번 3.학과 4.성적5.이메일");
		int key = sc.nextInt();
		if (key == 1) {
			System.out.println("조회할 이름을 입력하세요");
			student.setName(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("조회한 이름이 없습니다.");
		} else if (key == 2) {
			System.out.println("조회할 학번 입력하세요");
			student.setHakbun(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("조회한 학번이 없습니다.");
		} else if (key == 3) {
			System.out.println("조회할 학과를 입력하세요");
			student.setDept(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("조회한 학과는 없습니다.");
		} else if (key == 4) {
			System.out.println("조회할 성적이 입력하세요");
			student.setGrage(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("조회 점수가 없습니다.");
		}
		else if (key == 5) {
			System.out.println("조회할 이메일이 입력하세요");
			student.setEmail(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("조회 이메일은 없습니다.");
		}
	}
	

	private void namesort() {
		sc = new Scanner(System.in);
		System.out.println("이름을 정렬합니다.\n 1.오름차순 2.내림차순");
		int key = sc.nextInt();
		studentDAO.namesort(key);
	}

	private void gradesort() {
		sc = new Scanner(System.in);
		System.out.println("성적을 정렬합니다.\n 1.오름차순 2.내림차순");
		int key = sc.nextInt();
		studentDAO.gradesort(key);
	}

	private void delete() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.println("삭제할 전화번호를 입력하세요");
		student.setCellphone(sc.next());

		studentDAO.delete(student);
	}

	private void update() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.println("수정할 전화번호를 입력하세요");
		student.setCellphone(sc.next());

		System.out.print("이름 : ");
		student.setName(sc.next());
		System.out.print("학번 : ");
		student.setHakbun(sc.next());
		System.out.print("이메일 : ");
		student.setEmail(sc.next());
		System.out.print("학과 : ");
		student.setDept(sc.next());
		System.out.print("성적 : ");
		student.setGrage(sc.next());

		
		studentDAO.update(student);
		studentView.printupdate(student);
		

	}

	private void open() {
		studentDAO.open();
	}

	private void save() {
		studentDAO.save();
	}

	private void listAll() {
		// Controller의 역할 : 요청을 받아 (기본적인 처리 후) DAO에게 전달하고,
		// DAO가 처리한 내용을 받아서(추가적인 처리 후) 뷰에게 전달
		studentView.printStudentList(studentDAO.readList()); // VIEW에게 전달
		/*
		 * ArrayList<Student> studentList = studentDAO.readList(); for(Student s :
		 * studentList) System.out.print(s.getName() + "|" + s.getHakbun() + "\n");
		 */
	}

	private void list() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.print("전화번호를 입력하세요: ");
		student.setCellphone(sc.next());
		Student found = null;
		if ((found = studentDAO.read(student)) != null)
			studentView.printStudent(found);
		/*
		 * System.out.print(found.getHakbun() + "|" + found.getName() + " | " +
		 * found.getEmail() + " | " + found.getDept() + "\n");
		 */
		else
			studentView.printException("입력한 전화번호의 학생은 존재하지 않습니다");
		// System.out.print("입력한 학번의 학생은 존재하지 않습니다\n");
	}

	private void register() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.print("이름 : ");
		student.setName(sc.next());
		System.out.print("학번 : ");
		student.setHakbun(sc.next());
		System.out.print("이메일 : ");
		student.setEmail(sc.next());
		System.out.print("학과 : ");
		student.setDept(sc.next());
		System.out.print("성적 : ");
		student.setGrage(sc.next());
		System.out.print("핸드폰 : ");
		student.setCellphone(sc.next());

		// egyou@induk.ac.kr vs a@a.com : e-mail : @ 기호가 있고, @ 기호 앞에 글자수는 3자 이상
		if (isValidEmail(student.getEmail()) && studentDAO.isValidCellphone(student.getCellphone())
				&& studentDAO.primary(student.getCellphone())) {
			studentDAO.create(student);
			studentView.printRegister(student);
		}
		/*
		 * else System.out.println("이메일 형식을 확인하십시요");
		 */
	}

	private boolean isValidEmail(String email) {
		boolean ok = false;
		int i = email.indexOf('@');
		try {
			if (i < 0) {
				throw new Exception("@이 있어야 합니다.");
			} else if (email.substring(0, i).length() < 3) {
				throw new Exception("아이디는 3자 이상.");
			} else {
				ok = true;
			}
		} catch (Exception e) {
			// System.out.println(e.getMessage());
		}
		return ok;
	}
}
