package idu.cs.pim.a201512033.controller;

import java.util.ArrayList;
import java.util.Scanner;

import idu.cs.pim.a201512033.model.Student;
import idu.cs.pim.a201512033.model.StudentDAO;
import idu.cs.pim.a201512033.view.StudentView;

public class StudentController implements Controller {
	StudentDAO studentDAO = new StudentDAO();
	Student student = null; // ���������� ������ �����ϴ� ��ü�� null(�����ϴ� ��ü ����) ������
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

	StudentView studentView = new StudentView(); // �ν��Ͻ� ����, ��� �ʵ�

	private void ALLread() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.println("��ȸ�� ī�װ��� �������ּ���(������ȸ����)\n 1.�̸�  2.�й� 3.�а� 4.����5.�̸���");
		int key = sc.nextInt();
		if (key == 1) {
			System.out.println("��ȸ�� �̸��� �Է��ϼ���");
			student.setName(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("��ȸ�� �̸��� �����ϴ�.");
		} else if (key == 2) {
			System.out.println("��ȸ�� �й� �Է��ϼ���");
			student.setHakbun(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("��ȸ�� �й��� �����ϴ�.");
		} else if (key == 3) {
			System.out.println("��ȸ�� �а��� �Է��ϼ���");
			student.setDept(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("��ȸ�� �а��� �����ϴ�.");
		} else if (key == 4) {
			System.out.println("��ȸ�� ������ �Է��ϼ���");
			student.setGrage(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("��ȸ ������ �����ϴ�.");
		}
		else if (key == 5) {
			System.out.println("��ȸ�� �̸����� �Է��ϼ���");
			student.setEmail(sc.next());
			ArrayList<Student> findname = studentDAO.ALLread(student, key);
			if (findname != null) {
				studentView.printStudentList(findname);
			} else
				System.out.println("��ȸ �̸����� �����ϴ�.");
		}
	}
	

	private void namesort() {
		sc = new Scanner(System.in);
		System.out.println("�̸��� �����մϴ�.\n 1.�������� 2.��������");
		int key = sc.nextInt();
		studentDAO.namesort(key);
	}

	private void gradesort() {
		sc = new Scanner(System.in);
		System.out.println("������ �����մϴ�.\n 1.�������� 2.��������");
		int key = sc.nextInt();
		studentDAO.gradesort(key);
	}

	private void delete() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.println("������ ��ȭ��ȣ�� �Է��ϼ���");
		student.setCellphone(sc.next());

		studentDAO.delete(student);
	}

	private void update() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.println("������ ��ȭ��ȣ�� �Է��ϼ���");
		student.setCellphone(sc.next());

		System.out.print("�̸� : ");
		student.setName(sc.next());
		System.out.print("�й� : ");
		student.setHakbun(sc.next());
		System.out.print("�̸��� : ");
		student.setEmail(sc.next());
		System.out.print("�а� : ");
		student.setDept(sc.next());
		System.out.print("���� : ");
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
		// Controller�� ���� : ��û�� �޾� (�⺻���� ó�� ��) DAO���� �����ϰ�,
		// DAO�� ó���� ������ �޾Ƽ�(�߰����� ó�� ��) �信�� ����
		studentView.printStudentList(studentDAO.readList()); // VIEW���� ����
		/*
		 * ArrayList<Student> studentList = studentDAO.readList(); for(Student s :
		 * studentList) System.out.print(s.getName() + "|" + s.getHakbun() + "\n");
		 */
	}

	private void list() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.print("��ȭ��ȣ�� �Է��ϼ���: ");
		student.setCellphone(sc.next());
		Student found = null;
		if ((found = studentDAO.read(student)) != null)
			studentView.printStudent(found);
		/*
		 * System.out.print(found.getHakbun() + "|" + found.getName() + " | " +
		 * found.getEmail() + " | " + found.getDept() + "\n");
		 */
		else
			studentView.printException("�Է��� ��ȭ��ȣ�� �л��� �������� �ʽ��ϴ�");
		// System.out.print("�Է��� �й��� �л��� �������� �ʽ��ϴ�\n");
	}

	private void register() {
		student = new Student(); //
		sc = new Scanner(System.in);
		System.out.print("�̸� : ");
		student.setName(sc.next());
		System.out.print("�й� : ");
		student.setHakbun(sc.next());
		System.out.print("�̸��� : ");
		student.setEmail(sc.next());
		System.out.print("�а� : ");
		student.setDept(sc.next());
		System.out.print("���� : ");
		student.setGrage(sc.next());
		System.out.print("�ڵ��� : ");
		student.setCellphone(sc.next());

		// egyou@induk.ac.kr vs a@a.com : e-mail : @ ��ȣ�� �ְ�, @ ��ȣ �տ� ���ڼ��� 3�� �̻�
		if (isValidEmail(student.getEmail()) && studentDAO.isValidCellphone(student.getCellphone())
				&& studentDAO.primary(student.getCellphone())) {
			studentDAO.create(student);
			studentView.printRegister(student);
		}
		/*
		 * else System.out.println("�̸��� ������ Ȯ���Ͻʽÿ�");
		 */
	}

	private boolean isValidEmail(String email) {
		boolean ok = false;
		int i = email.indexOf('@');
		try {
			if (i < 0) {
				throw new Exception("@�� �־�� �մϴ�.");
			} else if (email.substring(0, i).length() < 3) {
				throw new Exception("���̵�� 3�� �̻�.");
			} else {
				ok = true;
			}
		} catch (Exception e) {
			// System.out.println(e.getMessage());
		}
		return ok;
	}
}
