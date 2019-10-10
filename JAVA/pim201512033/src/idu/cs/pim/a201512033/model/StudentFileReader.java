package idu.cs.pim.a201512033.model;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Scanner;

public class StudentFileReader {
	
	private Scanner sc = null;
	
	public StudentFileReader(File f) throws FileNotFoundException {
		sc = new Scanner(f);
	}
	public ArrayList<Student> readStudentList() {
		ArrayList<Student> retStudentList = new ArrayList<Student>();
		while(sc.hasNext()) {
			Student student = new Student();
			String[] strArr = sc.nextLine().split("\t");
			student.setName(strArr[0]);
			student.setHakbun(strArr[1]);
			student.setEmail(strArr[2]);
			student.setDept(strArr[3]);
			student.setGrage(strArr[4]);
			student.setCellphone(strArr[5]);
			retStudentList.add(student);
		}
		return retStudentList;
	}
}
