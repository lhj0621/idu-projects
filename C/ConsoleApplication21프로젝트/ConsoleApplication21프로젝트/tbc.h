#ifndef TURBOC_HEADER
#define TURBOC_HEADER

#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <time.h>
#include <windows.h> 

#define delay(n) Sleep(n)                                // n/1000�ʸ�ŭ �ð� ����
#define randomize() srand((unsigned)time(NULL))          // ���� �߻��� �ʱ�ȭ
#define random(n) (rand() % (n))                         //0~n������ ���� �߻�
#ifndef TURBOC_PROTOTYPE_ONLY                            // �� ��ũ�ΰ� ���ǵǾ� ������ �Լ��� ������ �����ϰ� ���Ǵ� ���� �ʴ´�.
#define PAUSE 112                                        //Ǫ��

typedef enum { NOCURSOR, SOLIDCURSOR, NORMALCURSOR } CURSOR_TYPE;
void clrscr(void);
void gotoxy(int x, int y);
int wherex(void);
int wherey(void);
void setcursortype(CURSOR_TYPE c);

void clrscr(void) // ȭ���� ��� �����.

{
	system("cls");
}


void gotoxy(int x, int y) // Ŀ���� x,y��ǥ�� �̵���Ų��.

{
	COORD Cur;
	Cur.X = x;
	Cur.Y = y;
	SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), Cur);

}


int wherex(void) // Ŀ���� x ��ǥ�� �����Ѵ�.

{
	CONSOLE_SCREEN_BUFFER_INFO BufInfo;
	GetConsoleScreenBufferInfo(GetStdHandle(STD_OUTPUT_HANDLE), &BufInfo);
	return BufInfo.dwCursorPosition.X;
}


int wherey(void) // Ŀ���� y��ǥ�� �����Ѵ�.

{
	CONSOLE_SCREEN_BUFFER_INFO BufInfo;
	GetConsoleScreenBufferInfo(GetStdHandle(STD_OUTPUT_HANDLE), &BufInfo);
	return BufInfo.dwCursorPosition.Y;

}


void setcursortype(CURSOR_TYPE c) // Ŀ���� ����ų� �ٽ� ǥ���Ѵ�.

{
	CONSOLE_CURSOR_INFO CurInfo;

	switch (c)
	{
	case NOCURSOR:
		CurInfo.dwSize = 1;
		CurInfo.bVisible = FALSE;
		break;


	case SOLIDCURSOR:
		CurInfo.dwSize = 100;
		CurInfo.bVisible = TRUE;
		break;

	case NORMALCURSOR:
		CurInfo.dwSize = 20;
		CurInfo.bVisible = TRUE;
		break;
	}
	SetConsoleCursorInfo(GetStdHandle(STD_OUTPUT_HANDLE), &CurInfo);
}



#endif // TURBOC_PROTOTYPE_ONLY
#endif // TURBOC_HEADER