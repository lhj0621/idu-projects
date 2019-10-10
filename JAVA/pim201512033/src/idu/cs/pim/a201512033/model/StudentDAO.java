package idu.cs.pim.a201512033.model;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

public class StudentDAO implements DAO {
	// CRUD : Create Read Update Delete
	// DB record : insert, select, update, delete

	// List list = new ArrayList(); // ArrayList : 모든 Object 를 상속받은 객체를 처리할 수 있음
	ArrayList<Student> list = new ArrayList<Student>(); // Student 객체만 처리할 수 있음

	File fName = new File("pim.txt");

	public ArrayList<Student> readList() { // student 집합 객체을 읽어 들임
		return list;
	}

	public ArrayList<Student> getList() {
		return list;
	}

	public void setList(ArrayList<Student> list) {
		this.list = list;
	}

	public boolean create(Student o) {
		boolean ok = false;
		// list = new LinkedList(); // 다형성
		list.add(o);
		return ok;
	}

	public Student read(Student student) {
		// TODO Auto-generated method stub
		Student findStudent = null;
		for (Student s : list)
			if (s.getCellphone().equals(student.getCellphone())) {
				findStudent = s;
			}
		return findStudent;
	}

	public ArrayList<Student> ALLread(Student student, int key) {
		ArrayList<Student> tempsave = new ArrayList<Student>();
		if (key == 1) {
			for (Student m : list) {
				if (m.getName().equals(student.getName())) {
					tempsave.add(m);
				}
			}
		}
		else if(key==2)
			for (Student m : list) {
				if (m.getHakbun().equals(student.getHakbun())) {
					tempsave.add(m);
				}
			}
		else if(key==3)
			for (Student m : list) {
				if (m.getDept().equals(student.getDept())) {
					tempsave.add(m);
				}
			}
		else if(key==4)
			for (Student m : list) {
				if (m.getGrage().equals(student.getGrage())) {
					tempsave.add(m);
				}
			}
		if (key == 5) {
			for (Student m : list) {
				if (m.getEmail().equals(student.getEmail())) {
					tempsave.add(m);
				}
			}
		}
		
		return tempsave;

	}

	
	@Override
	public void open() {
		// TODO Auto-generated method stub
		try {
			StudentFileReader sfr = new StudentFileReader(fName);
			list = sfr.readStudentList();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	@Override
	public void save() {
		// TODO Auto-generated method stub
		try {
			StudentFileWriter sfw = new StudentFileWriter(fName);
			sfw.saveStudentList(list); // 메모리에 있는 student의 ArrayList를 파일에 저장
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public boolean primary(String phone) {
		boolean ok = true;
		for (Student m : list) {
			if (m.getCellphone().equals(phone)) {
				ok = false;
			} 
		}
		return ok;
	}

	public boolean isValidCellphone(String phone) {
		boolean ok = false;
		if (phone.charAt(3) == '-' && phone.charAt(8) == '-' && phone.length() == 13) {
			ok = true;
		} else
			System.out.println("핸드폰 형식이 맞지 않습니다 nnn-nnnn-nnnn 으로 입력해주세요");
		return ok;
	}

	public void update(Student student) {
		for (int i = 0; i < list.size(); i++) {
			if (student.getCellphone().equals(list.get(i).getCellphone())) {
				list.set(i, student);
			}
		}
	}

	public void delete(Student student) {
		for (int i = 0; i < list.size(); i++) {
			if (student.getCellphone().equals(list.get(i).getCellphone())) {
				list.remove(i);
			}
		}
	}

	public void namesort(int key) {
		Student temp = null;
		if (key == 1) {
			for (int i = 1; i < list.size(); i++) {// 오름 차순
				for (int j = 0; j < list.size() - 1; j++) {
					if (list.get(j).getName().compareTo(list.get(j + 1).getName()) > 0) {
						temp = list.get(j);
						list.set(j, list.get(j + 1));
						list.set(j + 1, temp);
					}
				}
			}
		} else if (key == 2) {
			for (int i = 1; i < list.size(); i++) {// 내림 차순
				for (int j = 0; j < list.size() - 1; j++) {
					if (list.get(j).getName().compareTo(list.get(j + 1).getName()) < 0) {
						temp = list.get(j);
						list.set(j, list.get(j + 1));
						list.set(j + 1, temp);
					}
				}
			}
		}

	}

	public void gradesort(int key) {

		Student temp = null;
		if (key == 1) {
			for (int i = 1; i < list.size(); i++) {// 오름차순
				for (int j = 0; j < list.size() - 1; j++) {
					if (list.get(j).getGrage().compareTo(list.get(j + 1).getGrage()) < 0) {
						temp = list.get(j);
						list.set(j, list.get(j + 1));
						list.set(j + 1, temp);
					}
				}
			}
		} else if (key == 2)

		{
			for (int i = 1; i < list.size(); i++) {// 내림차순
				for (int j = 0; j < list.size() - 1; j++) {
					if (list.get(j).getGrage().compareTo(list.get(j + 1).getGrage()) > 0) {
						temp = list.get(j);
						list.set(j, list.get(j + 1));
						list.set(j + 1, temp);
					}
				}
			}
		}
	}
}
