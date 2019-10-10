package idu.cs.pim.a201512033.application;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Scanner;

import idu.cs.pim.a201512033.controller.StudentController;

public class Main {
	public static void main(String[] args) {
		// System.out : 표준 출력
		// System.in : 표준 입력, 표준 입력은 사용하기가 어려움, 1글자씩 처리하는 방식이라 번거로움이 많이 발생함.

		// System.in을 Piping하여 처리함, BufferedReader나 Scanner에 정의된 편리한? 메소드를 사용 가능
		/*
		 * System.out.println("BufferedReader 객체를 활용한 한 줄 읽기 : " ); BufferedReader br =
		 * new BufferedReader(new InputStreamReader(System.in)); try { String strBR =
		 * br.readLine(); String[] words = strBR.split(" "); int result = 0; for(String
		 * s : words) result = result + Integer.parseInt(s); // wrapper class
		 * System.out.println("입력하신 숫자문자열을 숫자로 변환하여 구한 합 : " + result); } catch
		 * (IOException e) { // TODO Auto-generated catch block e.printStackTrace(); }
		 */

		String[] menus = { "0.종료", "1.등록", "2.조회", "3.수정", "4.삭제", "5.전체조회", "6.정렬(이름)", "7.정렬(성적)", "8.카테고리 조회", "r.읽기",
				"w.저장" };
		for (String m : menus)
			System.out.print(m + " | "); // 집합 객체 - 문자열 배열을 순차적으로 접근
		System.out.print("\n");
		StudentController studentCtrl = new StudentController();

		Scanner sc = new Scanner(System.in);
		String key = sc.next();
		while (true) {
			switch (key) {
			case "0":
				System.out.println("종료버튼을 클릭하셨습니다");
				sc.close(); // 자원 회수하는 문장
				System.exit(1);
				break;
			case "1":
				studentCtrl.process("register");
				break;
			case "2":
				studentCtrl.process("list");
				break;
			case "3":
				studentCtrl.process("update");
				break;
			case "4":
				studentCtrl.process("delete");
				break;
			case "5":
				studentCtrl.process("listAll");
				break;
			case "6":
				studentCtrl.process("namesort");
				break;
			case "7":
				studentCtrl.process("gradesort");
				break;
			case "8":
				studentCtrl.process("ALLread");
				break;
			case "r":
				studentCtrl.process("open");
				break;
			case "w":
				studentCtrl.process("save");
				break;
			default:
				System.out.println("명령에 해당하는 숫자 코드를 입력하시오");
				break;
			}
			for (String m : menus)
				System.out.print(m + " | "); // 집합 객체 - 문자열 배열을 순차적으로 접근
			System.out.print("\n");
			key = sc.next();

		}

		/*
		 * String strSC = sc.nextLine(); System.out.println(strSC);
		 */
	}
}
