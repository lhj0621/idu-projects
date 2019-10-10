#ifndef TURBOC_HEADER
#define TURBOC_HEADER

#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <time.h>
#include <windows.h> 

#define delay(n) Sleep(n)                                // n/1000초만큼 시간 지연
#define randomize() srand((unsigned)time(NULL))          // 난수 발생기 초기화
#define random(n) (rand() % (n))                         //0~n까지의 난수 발생
#ifndef TURBOC_PROTOTYPE_ONLY                            // 이 매크로가 정의되어 있으면 함수의 원형만 선언하고 정의는 하지 않는다.
#define PAUSE 112                                        //푸쉬

typedef enum { NOCURSOR, SOLIDCURSOR, NORMALCURSOR } CURSOR_TYPE;
void clrscr(void);
void gotoxy(int x, int y);
int wherex(void);
int wherey(void);
void setcursortype(CURSOR_TYPE c);

void clrscr(void) // 화면을 모두 지운다.

{
	system("cls");
}


void gotoxy(int x, int y) // 커서를 x,y좌표로 이동시킨다.

{
	COORD Cur;
	Cur.X = x;
	Cur.Y = y;
	SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), Cur);

}


int wherex(void) // 커서의 x 좌표를 조사한다.

{
	CONSOLE_SCREEN_BUFFER_INFO BufInfo;
	GetConsoleScreenBufferInfo(GetStdHandle(STD_OUTPUT_HANDLE), &BufInfo);
	return BufInfo.dwCursorPosition.X;
}


int wherey(void) // 커서의 y좌표를 조사한다.

{
	CONSOLE_SCREEN_BUFFER_INFO BufInfo;
	GetConsoleScreenBufferInfo(GetStdHandle(STD_OUTPUT_HANDLE), &BufInfo);
	return BufInfo.dwCursorPosition.Y;

}


void setcursortype(CURSOR_TYPE c) // 커서를 숨기거나 다시 표시한다.

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