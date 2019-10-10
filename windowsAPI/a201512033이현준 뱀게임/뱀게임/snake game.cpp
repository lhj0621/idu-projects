#include <windows.h>
#include "resource.h"
typedef struct {
	int x;
	int y;
} Tail;//꼬리의 좌표를 선언 
typedef struct {
	int bx;
	int by;
} BTail;//보스의 좌표를 선언 
Tail t[100];        //꼬리길이배열
int tail_num;
int x1, y1, x2, y2; //파란별 x2,y2좌표 생성
BTail boss;         //보스 좌표
int bossmove, bosscoming = 0;
int effect = 10;    //파란별로 인한 효과 변수
int blue_star;     //파란별 생성변수
int speed = 100;    //게임 스피드의 변수화
int score = 0;      //처음 스코어 생성
BOOL right = true, left, up, down;
static int time;
LRESULT CALLBACK WndProc(HWND hWnd, UINT msg, WPARAM wParam, LPARAM lParam);
void bump(HWND);     //충돌
void draw(HWND);     //그림
void win(HWND);      //승리
HINSTANCE g_hInst;
LPSTR lpszClass = "뱀게임";
int APIENTRY WinMain(HINSTANCE hInstance, HINSTANCE hPrevInstance, LPSTR lpszCmdParam, int nCmdShow)
{
	HWND hWnd;
	MSG Message;
	WNDCLASS v; //클래스이름 V 
	g_hInst = hInstance;
	v.cbClsExtra = 0;
	v.cbWndExtra = 0;
	v.hbrBackground = (HBRUSH)GetStockObject(4);
	v.hCursor = LoadCursor(NULL, IDC_ARROW);
	v.hIcon = LoadIcon(NULL, IDI_APPLICATION);
	v.hInstance = hInstance;
	v.lpfnWndProc = (WNDPROC)WndProc;
	v.lpszClassName = lpszClass;
	v.lpszMenuName = NULL;
	v.style = CS_HREDRAW | CS_VREDRAW;
	RegisterClass(&v);
	hWnd = CreateWindow(lpszClass, lpszClass, WS_OVERLAPPEDWINDOW, 50, 50, 900, 600, NULL, (HMENU)NULL, hInstance, NULL);
	ShowWindow(hWnd, nCmdShow);
	while (GetMessage(&Message, 0, 0, 0))
	{
		TranslateMessage(&Message);
		DispatchMessage(&Message);
	}
	return Message.wParam;
}
LRESULT CALLBACK WndProc(HWND hWnd, UINT msg, WPARAM wParam, LPARAM lParam)
{
	HDC hdc;
	switch (msg)
	{
	case WM_CREATE:
		SetTimer(hWnd, 1, speed, NULL);//게임스피드 
		SetTimer(hWnd, 2, 1000, NULL);//게임경과시간		
		while ((x1 = rand()) < 55 || x1 > 570); //가로
		while ((y1 = rand()) < 55 || y1 > 460); //세로
		t[0].x = 50, t[0].y = 50;
		return 0;
	case WM_KEYDOWN:
		switch (wParam)
		{
		case VK_LEFT:
			if (!right)
				left = true, right = false, up = false, down = false;
			break;
		case VK_RIGHT:
			if (!left)
				right = true, left = false, up = false, down = false;
			break;
		case VK_UP:
			if (!down)
				up = true, right = false, left = false, down = false;
			break;
		case VK_DOWN:
			if (!up)
				down = true, right = false, left = false, up = false;
			break;
		case 0x50: //P 일시정지
			KillTimer(hWnd, 1); // 게임스피드
			KillTimer(hWnd, 2); //게임경과시간
			KillTimer(hWnd, 3); //보스
			break;
		case 0x53://S 일시정지 그만!
			SetTimer(hWnd, 1, speed, NULL);//게임스피드 
			SetTimer(hWnd, 2, 1000, NULL);//게임경과시간		
			SetTimer(hWnd, 3, 400, NULL);//보스
			break;
		case 0x52://R 다시 시작
			InvalidateRect(hWnd, NULL, TRUE);
			boss.bx = 285, boss.by = 230;  //보스 시작 좌표
			SetTimer(hWnd, 1, speed, NULL);//게임스피드 
			SetTimer(hWnd, 2, 1000, NULL);//게임경과시간		
			SetTimer(hWnd, 3, 400, NULL);//보스
			time = 0;  //시작 타임
			score = 0; //시작 점수
			while ((x1 = rand()) < 55 || x1 > 570);
			while ((y1 = rand()) < 55 || y1 > 460);
			down = false, right = false, left = false, up = false;   //움직이못하게설정
			t[0].x = 50;  //좌표와 방향을 초기화 해줌 
			t[0].y = 50;
			right = true;
			tail_num = 0;
		}
		return 0;
	case WM_TIMER://이동거리시간설정
		switch (wParam)
	case 1:
		{
			time++;
			for (int i = tail_num; i > 0; i--)
			{
				t[i].x = t[i - 1].x;
				t[i].y = t[i - 1].y;
			}
			if (right)
			{
				t[0].x += 20;
			}

			if (left)
			{
				t[0].x -= 20;
			}

			if (up)
			{
				t[0].y -= 20;
			}

			if (down)
			{
				t[0].y += 20;
			}
			for (int i = 1; i <= tail_num; i++)//머리와 몸통과의 충돌처리 
			{
				if (t[0].x == t[i].x && t[0].y == t[i].y)
					bump(hWnd);
			}
			if ((t[0].x + 10 > x1 && t[0].x < x1 + 40) && (t[0].y + 10 > y1 && t[0].y < y1 + 40))//먹이와의 충돌처리
			{
				tail_num++;//꼬리증가
				while ((x1 = rand()) < 55 || x1 > 570);
				while ((y1 = rand()) < 55 || y1 > 460);
				score = score + 150;
				blue_star = rand();
				if ((blue_star % 3) == 0)  //빨간사과를 먹었을때 1/3확율로 황금사과 생성
				{
					while ((x2 = rand()) < 55 || x2 > 570); //가로 파란별
					while ((y2 = rand()) < 55 || y2 > 460); //세로  파란별
				}

			}
			if ((t[0].x + 10 > boss.bx && t[0].x < boss.bx + 30) && (t[0].y + 10 > boss.by && t[0].y < boss.by + 30))  //보스와의 충돌 처리
			{
				if (tail_num >= 10) //꼬리 갯수에따라 충돌시 결과가 달라짐
				{
					score = score + tail_num * 300;
					win(hWnd);
				}
				else
				{
					bump(hWnd);
				}
			}
			if ((t[0].x + 20 > x2 && t[0].x < x2 + 20) && (t[0].y + 20 > y2 && t[0].y < y2 + 20))//파란별과의 충돌처리
			{
				effect = rand() % 7;
				switch (effect)
				{
				case 0: tail_num--;
					break;
				case 1: tail_num--;
					break;
				case 2: tail_num += 2;
					break;
				case 3: speed = speed - 50;
					break;
				case 4: speed = speed + 20;
					break;
				case 5: score = score + 400;
					break;
				case 6: score = score - 400;
					break;
				}
				SetTimer(hWnd, 1, speed, NULL);//게임스피드
				tail_num++;//꼬리증가
				x2 = 0;
				y2 = 0;
				score = score + 100;
				blue_star = rand();
				if ((blue_star % 3) == 0)  //파란별를 먹었을때 1/3확율로 황금사과 생성
				{
					while ((x2 = rand()) < 55 || x2 > 570); //가로  황금사과
					while ((y2 = rand()) < 55 || y2 > 460); //세로  황금사과
				}
			}
			if (t[0].x >= 590 || t[0].y >= 490 || t[0].x <= 45 || t[0].y <= 45)//벽에 충돌처리
			{
				bump(hWnd);
			}
			InvalidateRect(hWnd, NULL, FALSE);
			return 0;
	case 2:
		boss.bx = 285, boss.by = 230; //보스 소환 좌표
		bosscoming = 1;
		SetTimer(hWnd, 3, 400, NULL); // 보스 이동하는 주기 타이머
	case 3:
		KillTimer(hWnd, 2); // 보스 여러마리 나오는 것을 방지
		bossmove = rand() % 6; //0~5 까지 난수 발생
		switch (bossmove)
		{
		case 0:
			if (boss.bx <= 520)
			{
				boss.bx += 40;
			}
			break;
		case 1:
			if (boss.bx >= 60)
			{
				boss.bx -= 40;
			}
			break;
		case 2:
			if (boss.by <= 450)
			{
				boss.by += 40;
			}
			break;
		case 3:
			if (boss.by >= 60)
			{
				boss.by -= 40;
			}
			break;
		case 4:
			if (boss.by >= 60)
			{
				boss.by -= 40;
			}
			break;
		case 5:
			if (boss.bx >= 60)
			{
				boss.bx -= 40;
			}
			break;
		}
		}
	case WM_PAINT:
		draw(hWnd);
		return 0;
	case WM_DESTROY:
		PostQuitMessage(0);
		return 0;
	}
	return(DefWindowProc(hWnd, msg, wParam, lParam));
}
void bump(HWND hWnd)
{
	//충돌시 타이머를 꺼주므로해서 게임을 종료시킨다
	KillTimer(hWnd, 1); // 게임스피드
	KillTimer(hWnd, 2); //게임경과시간
	KillTimer(hWnd, 3); //보스
	if (IDYES == MessageBox(hWnd, "게임이 종료되었습니다. 다시 시작하시겠습니까?", "뱀 죽음", MB_YESNO))
	{
		InvalidateRect(hWnd, NULL, TRUE);
		boss.bx = 285, boss.by = 230;  //보스 시작 좌표
		SetTimer(hWnd, 1, speed, NULL);//게임스피드 
		SetTimer(hWnd, 2, 1000, NULL);//게임경과시간		
		SetTimer(hWnd, 3, 400, NULL);//보스
		time = 0;  //시작 타임
		score = 0; //시작 점수
		while ((x1 = rand()) < 55 || x1 > 570);
		while ((y1 = rand()) < 55 || y1 > 460);
		down = false, right = false, left = false, up = false;   //움직이못하게설정
		t[0].x = 50;  //좌표와 방향을 초기화 해줌 
		t[0].y = 50;
		right = true;
		tail_num = 0;
	}
	else //no 누르면 종료
		exit(0);
}
void win(HWND hWnd)
{
	KillTimer(hWnd, 1); // 게임스피드
	KillTimer(hWnd, 2); //게임경과시간
	KillTimer(hWnd, 3); //보스
	if (IDYES == MessageBox(hWnd, "보스를 물리쳤습니다. 승리하셨습니다. 다시 하시겠습니까?", "Win", MB_YESNO))
	{
		InvalidateRect(hWnd, NULL, TRUE);
		boss.bx = 285, boss.by = 230;  //보스 시작 좌표
		SetTimer(hWnd, 1, speed, NULL);//게임스피드 
		SetTimer(hWnd, 2, 1000, NULL);//게임경과시간		
		SetTimer(hWnd, 3, 400, NULL);//보스
		time = 0;  //시작 타임
		score = 0; //시작 점수
		while ((x1 = rand()) < 55 || x1 > 570);
		while ((y1 = rand()) < 55 || y1 > 460);
		down = false, right = false, left = false, up = false;   //움직이못하게설정
		t[0].x = 50;  //좌표와 방향을 초기화 해줌 
		t[0].y = 50;
		right = true;
		tail_num = 0;
	}
	else //no 누르면 종료
		exit(0);
}
void draw(HWND hWnd)
{
	HDC hdc, MemDC;
	PAINTSTRUCT ps;
	HBITMAP MyBitmap, OldBitmap;
	char temp1[50];
	char temp2[50];
	char msg[100];
	hdc = BeginPaint(hWnd, &ps);
	Rectangle(hdc, 40, 40, 600, 500);
	MemDC = CreateCompatibleDC(hdc);
	wsprintf(msg, "점수 : %d 점", score);
	TextOut(hdc, 620, 50, msg, strlen(msg));
	wsprintf(temp1, "시간 = %3d초", time / 10);
	TextOut(hdc, 620, 70, temp1, strlen(temp1));
	wsprintf(temp2, "뱀꼬리 = %d", tail_num);
	TextOut(hdc, 620, 90, temp2, strlen(temp2));
	TextOut(hdc, 650, 110, TEXT("-게임방법-"), 10);
	TextOut(hdc, 620, 130, TEXT("P:일시정지  S:일시정지 해체"), 27);
	TextOut(hdc, 620, 150, TEXT("R:다시 시작 "), 11);
	TextOut(hdc, 620, 180, TEXT("뱀꼬리가 10개이상시 보스처치 가능"), 33);
	TextOut(hdc, 620, 200, TEXT("뱀을움직여 별을 먹는 게임입니다"), 31);
	TextOut(hdc, 620, 250, TEXT("쥐을 먹으면 1/3의 확율로"), 24);
	TextOut(hdc, 620, 270, TEXT("파란별이 나오게 됩니다"), 22);
	TextOut(hdc, 620, 320, TEXT("파란별은 특수한 효과가 있습니다!"), 31);
	TextOut(hdc, 650, 370, TEXT("-점수-"), 6);
	TextOut(hdc, 620, 390, TEXT("쥐 : 150점"), 10);
	TextOut(hdc, 620, 410, TEXT("파란별 : 기본100점"), 18);
	TextOut(hdc, 620, 450, TEXT("-------------------------------------------"), 43);
	TextOut(hdc, 620, 490, TEXT("-------------------------------------------"), 43);
	switch (effect)
	{
	case 0: TextOut(hdc, 620, 470, TEXT("꼬리가 하나 감소했습니다!"), 25);
		break;
	case 1: TextOut(hdc, 620, 470, TEXT("꼬리가 하나 감소했습니다!"), 25);
		break;
	case 2: TextOut(hdc, 620, 470, TEXT("꼬리 두개가 증가했습니다"), 24);
		break;
	case 3: TextOut(hdc, 620, 470, TEXT("속도가 증가하였습니다!!"), 23);
		break;
	case 4: TextOut(hdc, 620, 470, TEXT("속도가 감소하였습니다!!"), 23);
		break;
	case 5: TextOut(hdc, 620, 470, TEXT("점수 500점 상승!"), 16);
		break;
	case 6: TextOut(hdc, 620, 470, TEXT("점수 300점 감소.."), 17);
		break;
	}
	if (bosscoming == 1)
	{
		MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP8));
		OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
		StretchBlt(hdc, boss.bx, boss.by, boss.bx * 2, boss.by * 2, MemDC, 0, 0, boss.bx + 30, boss.by + 30, SRCCOPY);
	}
	for (int i = 0; i <= tail_num; i++)
	{
		if (i == 0)
		{
			if (right)
			{
				MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP2));
				OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
				BitBlt(hdc, t[0].x, t[0].y, 20 + t[0].x, 20 + t[0].y, MemDC, 0, 0, SRCCOPY);
			}
			if (up)
			{
				MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP1));
				OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
				BitBlt(hdc, t[0].x, t[0].y, 20 + t[0].x, 20 + t[0].y, MemDC, 0, 0, SRCCOPY);
			}
			if (left)
			{
				MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP4));
				OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
				BitBlt(hdc, t[0].x, t[0].y, 20 + t[0].x, 20 + t[0].y, MemDC, 0, 0, SRCCOPY);
			}
			if (down)
			{
				MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP3));
				OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
				BitBlt(hdc, t[0].x, t[0].y, 20 + t[0].x, 20 + t[0].y, MemDC, 0, 0, SRCCOPY);
			}
		}
		else
		{//꼬리부분을 그려줌
			MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP5));
			OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
			BitBlt(hdc, t[i].x, t[i].y, 20 + t[i].x, 20 + t[i].y, MemDC, 0, 0, SRCCOPY);
		}
	}
	MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP6));//먹이
	OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
	BitBlt(hdc, x1, y1, 30 + x1, 30 + y1, MemDC, 0, 0, SRCCOPY);

	MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP7));
	OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
	BitBlt(hdc, x2, y2, x2 + 50, y2 + 50, MemDC, 0, 0, SRCCOPY);

	SelectObject(MemDC, OldBitmap);
	DeleteObject(MyBitmap);
	EndPaint(hWnd, &ps);
}
