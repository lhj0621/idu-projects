#define _CRT_SECURE_NO_WARNINGS

#include <windows.h>
#include <stdio.h> 
#include <conio.h>
#include <time.h>   
#include <mmsystem.h>         //�������
#pragma comment(lib, "winmm")   //�������

#include "tbc.h"   
#define MAX  100 
#define PAUSE 112


typedef struct {
	int x, y;
} POS;

void draw_screen();
void draw_char(int x, int y, char* s);
void move_snake(POS* snake, int len);
int check_snake(POS* snake, int len);
void main2();

int score = 0, totlen = 5;
int main()
{
	
	sndPlaySound(L"abc.wav", SND_ASYNC | SND_LOOP); //���۽� �뷡 
	int choice;
	for (;;)
	{
		score = 0, totlen = 5;
		draw_char(5, 1, "*����Ű*");
		draw_char(5, 2, "�̵�: ����� ");
		draw_char(5, 4, "*���ӹ��*");
		draw_char(5, 5, "�Ӹ��� �����̳� ���� ������ ���� ����.");
		draw_char(5, 8, "���������������������");
		draw_char(5, 9, "��1���� �Է��Ͻø� ������ �����մϴ�. ��");
		draw_char(5, 10, "��2���� �Է��Ͻø� ������ �����մϴ�. ��");
		draw_char(5, 11, "���������������������");
		draw_char(11, 13, "�Է��ϼ��� :");
		scanf("%d", &choice);
		if (choice == 1)
		{
			main2();
			clrscr();
		}
		else if (choice == 2)
		{
			return 0;
		}
		else
		{
			draw_char(11, 14, "�ٽ��Է��ϼ���");
		}
	}
}
void main2()
{
	POS snake[MAX], item;
	int i, n = 0, dir = -1, len = 5, loop = 1;
	int speed = 150;
	// ���� �ʱ�ȭ. 
	srand(time(NULL));
	// ��� �׸���. 
	draw_screen();
	// �� �ʱ���ġ. 
	for (i = 0; i < len; i++)
	{
		snake[i].x = 15 - i;
		snake[i].y = 10 - i;
		draw_char(snake[i].x, snake[i].y, "��");
	}
	// ���� ó�� ��ġ 
	item.x = rand() % 28 + 1;
	item.y = rand() % 18 + 1;
	/*draw_char(1, 21, "Score : 0");
	draw_char(1, 22, "���� ���� : 5");
	draw_char(1, 23, "����� ��ư�� RŰ�Դϴ�.");
	draw_char(1, 24, "�Ͻ����� Ű�� P�Դϴ�.");*/
	// ���� ����. 
	while (loop)
	{

		// ���̳� ���뿡 ��Ҵ��� üũ. 
		if (check_snake(snake, len) == 0)
			break;
		// ���̸� �Ծ����� üũ 
		if (snake[0].x == item.x && snake[0].y == item.y)
		{
			
			score += 10;
			totlen += 1;
			item.x = rand() % 28 + 1;
			item.y = rand() % 18 + 1;
			draw_char(1, 21, "Score : ");  //ȭ���� Ư����ġ�� ����ϴ� �Լ�
			printf("%d\n", score);           //���� ���ھ� ������ ��µ�
			draw_char(1, 22, "���� ���� : ");
			printf("%d", totlen);
			// ���ǵ� ����. 
			if (speed > 10) speed -= 5;
			// ���� ����. 
			if (len < MAX)
			{
				snake[len] = snake[len - 1];
				len++;
			}
		}
		// ������ ���. 
		draw_char(item.x, item.y, "��");
		// �� ������ ó��. 
		move_snake(snake, len);
		// ���ǵ� ����. 
		Sleep(speed);
	}
	draw_char(0, 25, "  Game Over\n");
	system("pause");
}
// ȭ���� Ư�� ��ġ�� �̵��� ����ϴ� �Լ�. 
void draw_char(int x, int y, char* s)
{
	COORD Pos = { x * 2, y };
	SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), Pos);
	printf("%s", s);
}
void draw_screen()
{
	int i;
	system("cls");
	draw_char(0, 0, "�̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢�");
	for (i = 1; i < 20; i++)
	{
		draw_char(0, i, "��");
		draw_char(30, i, "��");
	}
	draw_char(0, 20, "�̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢̢�\n");
	draw_char(1, 21, "Score : ");
	printf("%d\n", score);
	draw_char(1, 22, "���� ���� : ");
	printf("%d\n", totlen);
	//draw_char(1, 23, "����� ��ư�� RŰ�Դϴ�.");
	draw_char(1, 24, "�Ͻ����� Ű�� P�Դϴ�.");
}
void move_snake(POS* snake, int len)
{
	static int dir = -1;  //���α׷��� ���������� ���� �����ȴ�
	// Ű�Է� ó��. 
	if (_kbhit())
	{
		int key;
		do { key = _getch(); } while (key == 224);
		switch (key)
		{
		case 72: dir = 0; break; // ���� �̵�. 
		case 80: dir = 1; break; // �Ʒ��� �̵�. 
		case 75: dir = 2; break; // ���� �̵�. 
		case 77: dir = 3; break; // ������ �̵�. 
		case 'p':
			system("cls");
			draw_char(10, 3, "�Ͻ�����");
			draw_char(5, 5, "�ٽ� �����Ϸ��� �ƹ� Ű�� ��������.");
			_getch();
			clrscr();
			draw_screen();
			break;
		
		/*
		case 'r':
			system("cls");
			//if (len < MAX)
			//{
			//	//snake[len] = snake[len - 1];
			//	len;
			//}
		#define AA  7 
			system("cls");
			draw_screen();
			len = 5 ;
			
			score = 0, totlen = 5;
			if (len < AA)
			{
				snake[len] = snake[len - 1];
				len++;
			}
		
			
			//system("cls");
		
			for (int i = 0; i < len; i++) //������ġ ����
			{
				snake[i].x = 15 - i;
				snake[i].y = 10 - i;
				draw_char(snake[i].x, snake[i].y, "��");
			}
			//main2();
			//break;
			*/
		}
	}
	// �� ���� ó�� 
	if (dir != -1)
	{
		int i;
		draw_char(snake[len - 1].x, snake[len - 1].y, "  ");
		for (i = len - 1; i > 0; i--) snake[i] = snake[i - 1];
		draw_char(snake[1].x, snake[1].y, "��");
	}
	// �� �Ӹ� ó��. 
	switch (dir)
	{
	case 0: snake[0].y--; break;
	case 1: snake[0].y++; break;
	case 2: snake[0].x--; break;
	case 3: snake[0].x++; break;
	}
	draw_char(snake[0].x, snake[0].y, "��");
}
int check_snake(POS* snake, int len)
{
	int i;
	// �Ӹ��� ���� ��Ҵ��� üũ. 
	if (snake[0].x == 0 || snake[0].y == 0 || snake[0].x == 30 || snake[0].y == 20)
		return 0;
	// �Ӹ��� ���뿡 ��Ҵ��� üũ. 
	for (i = 1; i < len; i++)
	{
		if (snake[0].x == snake[i].x && snake[0].y == snake[i].y)
			return 0;
	}
	return 1;

}