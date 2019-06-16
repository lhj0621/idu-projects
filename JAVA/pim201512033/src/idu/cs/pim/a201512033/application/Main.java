package idu.cs.pim.a201512033.application;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Scanner;

import idu.cs.pim.a201512033.controller.StudentController;

public class Main {
	public static void main(String[] args) {
		// System.out : ǥ�� ���
		// System.in : ǥ�� �Է�, ǥ�� �Է��� ����ϱⰡ �����, 1���ھ� ó���ϴ� ����̶� ���ŷο��� ���� �߻���.

		// System.in�� Piping�Ͽ� ó����, BufferedReader�� Scanner�� ���ǵ� ����? �޼ҵ带 ��� ����
		/*
		 * System.out.println("BufferedReader ��ü�� Ȱ���� �� �� �б� : " ); BufferedReader br =
		 * new BufferedReader(new InputStreamReader(System.in)); try { String strBR =
		 * br.readLine(); String[] words = strBR.split(" "); int result = 0; for(String
		 * s : words) result = result + Integer.parseInt(s); // wrapper class
		 * System.out.println("�Է��Ͻ� ���ڹ��ڿ��� ���ڷ� ��ȯ�Ͽ� ���� �� : " + result); } catch
		 * (IOException e) { // TODO Auto-generated catch block e.printStackTrace(); }
		 */

		String[] menus = { "0.����", "1.���", "2.��ȸ", "3.����", "4.����", "5.��ü��ȸ", "6.����(�̸�)", "7.����(����)", "8.ī�װ� ��ȸ", "r.�б�",
				"w.����" };
		for (String m : menus)
			System.out.print(m + " | "); // ���� ��ü - ���ڿ� �迭�� ���������� ����
		System.out.print("\n");
		StudentController studentCtrl = new StudentController();

		Scanner sc = new Scanner(System.in);
		String key = sc.next();
		while (true) {
			switch (key) {
			case "0":
				System.out.println("�����ư�� Ŭ���ϼ̽��ϴ�");
				sc.close(); // �ڿ� ȸ���ϴ� ����
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
				System.out.println("��ɿ� �ش��ϴ� ���� �ڵ带 �Է��Ͻÿ�");
				break;
			}
			for (String m : menus)
				System.out.print(m + " | "); // ���� ��ü - ���ڿ� �迭�� ���������� ����
			System.out.print("\n");
			key = sc.next();

		}

		/*
		 * String strSC = sc.nextLine(); System.out.println(strSC);
		 */
	}
}
