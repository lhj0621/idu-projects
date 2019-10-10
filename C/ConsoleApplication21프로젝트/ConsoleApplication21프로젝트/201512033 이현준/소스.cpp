#define _CRT_SECURE_NO_WARNINGS

#include <windows.h>
#include <stdio.h> 
#include <conio.h>
#include <time.h>   
#include <mmsystem.h>         //음악재생
#pragma comment(lib, "winmm")   //음악재생

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
	
	sndPlaySound(L"abc.wav", SND_ASYNC | SND_LOOP); //시작시 노래 
	int choice;
	for (;;)
	{
		score = 0, totlen = 5;
		draw_char(5, 1, "*조작키*");
		draw_char(5, 2, "이동: ←→↑↓ ");
		draw_char(5, 4, "*게임방법*");
		draw_char(5, 5, "머리가 몸통이나 벽에 닿으면 게임 오버.");
		draw_char(5, 8, "■■■■■■■■■■■■■■■■■■■■");
		draw_char(5, 9, "■1번을 입력하시면 게임을 시작합니다. ■");
		draw_char(5, 10, "■2번을 입력하시면 게임을 종료합니다. ■");
		draw_char(5, 11, "■■■■■■■■■■■■■■■■■■■■");
		draw_char(11, 13, "입력하세요 :");
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
			draw_char(11, 14, "다시입력하세요");
		}
	}
}
void main2()
{
	POS snake[MAX], item;
	int i, n = 0, dir = -1, len = 5, loop = 1;
	int speed = 150;
	// 랜덤 초기화. 
	srand(time(NULL));
	// 배경 그리기. 
	draw_screen();
	// 뱀 초기위치. 
	for (i = 0; i < len; i++)
	{
		snake[i].x = 15 - i;
		snake[i].y = 10 - i;
		draw_char(snake[i].x, snake[i].y, "□");
	}
	// 먹이 처음 위치 
	item.x = rand() % 28 + 1;
	item.y = rand() % 18 + 1;
	/*draw_char(1, 21, "Score : 0");
	draw_char(1, 22, "뱀의 길이 : 5");
	draw_char(1, 23, "재시작 버튼은 R키입니다.");
	draw_char(1, 24, "일시정지 키는 P입니다.");*/
	// 게임 루프. 
	while (loop)
	{

		// 벽이나 몸통에 닿았는지 체크. 
		if (check_snake(snake, len) == 0)
			break;
		// 먹이를 먹었는지 체크 
		if (snake[0].x == item.x && snake[0].y == item.y)
		{
			
			score += 10;
			totlen += 1;
			item.x = rand() % 28 + 1;
			item.y = rand() % 18 + 1;
			draw_char(1, 21, "Score : ");  //화면의 특정위치에 출력하는 함수
			printf("%d\n", score);           //현제 스코어 점수가 출력됨
			draw_char(1, 22, "뱀의 길이 : ");
			printf("%d", totlen);
			// 스피드 증가. 
			if (speed > 10) speed -= 5;
			// 꼬리 증가. 
			if (len < MAX)
			{
				snake[len] = snake[len - 1];
				len++;
			}
		}
		// 아이템 출력. 
		draw_char(item.x, item.y, "★");
		// 뱀 움직임 처리. 
		move_snake(snake, len);
		// 스피드 조절. 
		Sleep(speed);
	}
	draw_char(0, 25, "  Game Over\n");
	system("pause");
}
// 화면의 특정 위치로 이동해 출력하는 함수. 
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
	draw_char(0, 0, "▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩");
	for (i = 1; i < 20; i++)
	{
		draw_char(0, i, "▩");
		draw_char(30, i, "▩");
	}
	draw_char(0, 20, "▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩▩\n");
	draw_char(1, 21, "Score : ");
	printf("%d\n", score);
	draw_char(1, 22, "뱀의 길이 : ");
	printf("%d\n", totlen);
	//draw_char(1, 23, "재시작 버튼은 R키입니다.");
	draw_char(1, 24, "일시정지 키는 P입니다.");
}
void move_snake(POS* snake, int len)
{
	static int dir = -1;  //프로그램이 끝날때까지 값이 누적된다
	// 키입력 처리. 
	if (_kbhit())
	{
		int key;
		do { key = _getch(); } while (key == 224);
		switch (key)
		{
		case 72: dir = 0; break; // 위쪽 이동. 
		case 80: dir = 1; break; // 아래쪽 이동. 
		case 75: dir = 2; break; // 왼쪽 이동. 
		case 77: dir = 3; break; // 오른쪽 이동. 
		case 'p':
			system("cls");
			draw_char(10, 3, "일시정지");
			draw_char(5, 5, "다시 시작하려면 아무 키나 누르세요.");
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
		
			for (int i = 0; i < len; i++) //시작위치 설정
			{
				snake[i].x = 15 - i;
				snake[i].y = 10 - i;
				draw_char(snake[i].x, snake[i].y, "□");
			}
			//main2();
			//break;
			*/
		}
	}
	// 뱀 몸통 처리 
	if (dir != -1)
	{
		int i;
		draw_char(snake[len - 1].x, snake[len - 1].y, "  ");
		for (i = len - 1; i > 0; i--) snake[i] = snake[i - 1];
		draw_char(snake[1].x, snake[1].y, "□");
	}
	// 뱀 머리 처리. 
	switch (dir)
	{
	case 0: snake[0].y--; break;
	case 1: snake[0].y++; break;
	case 2: snake[0].x--; break;
	case 3: snake[0].x++; break;
	}
	draw_char(snake[0].x, snake[0].y, "＠");
}
int check_snake(POS* snake, int len)
{
	int i;
	// 머리가 벽에 닿았는지 체크. 
	if (snake[0].x == 0 || snake[0].y == 0 || snake[0].x == 30 || snake[0].y == 20)
		return 0;
	// 머리가 몸통에 닿았는지 체크. 
	for (i = 1; i < len; i++)
	{
		if (snake[0].x == snake[i].x && snake[0].y == snake[i].y)
			return 0;
	}
	return 1;

}