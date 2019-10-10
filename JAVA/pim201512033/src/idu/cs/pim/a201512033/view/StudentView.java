package idu.cs.pim.a201512033.view;

import java.util.ArrayList;

import idu.cs.pim.a201512033.model.Student;

public class StudentView {
	private int sizeOfStar = 70;

	private void printHeader() {
		for (int i = 0; i <= sizeOfStar; i++)
			System.out.print('*');
		System.out.print("\n");
	}

	private void printFooter() {
		for (int i = 0; i <= sizeOfStar; i++)
			System.out.print('*');
		System.out.print("\n");
	}

	public void printException(String string) {
		// TODO Auto-generated method stub
		printHeader();
		System.out.print(string + "\n");
		printFooter();

	}

	public void printStudentList(ArrayList<Student> studentList) {
		printHeader();
		System.out
				.println("��      ��   |��    �� |��            ��                ��|��      ��|��    ��|��         ��           ��");
		for (Student student : studentList)
			System.out.print(student.getHakbun() + "|" + student.getName() + " | " + student.getEmail() + " | "
					+ student.getDept() + " | " + student.getGrage() + " | " + student.getCellphone() + "\n");
		printFooter();
	}

	public void printStudent(Student found) {
		// TODO Auto-generated method stub
		printHeader();
		System.out
				.println("��      ��   |��    �� |��            ��                ��|��      ��|��    ��|��         ��           ��");

		System.out.print(found.getHakbun() + "|" + found.getName() + " | " + found.getEmail() + " | " + found.getDept()
				+ " | " + found.getGrage() + " | " + found.getCellphone() + "\n");
		printFooter();
	}

	public void printRegister(Student student) {
		// TODO Auto-generated method stub
		printHeader();
		System.out.print(student.getName() + "�� ��� ����! ȯ���մϴ�. " + "\n");
		printFooter();
	}

	public void printupdate(Student student) {
		// TODO Auto-generated method stub
		printHeader();
		System.out.print(student.getName() + "�� ���� ����! ȯ���մϴ�. " + "\n");
		printFooter();
	}

}
