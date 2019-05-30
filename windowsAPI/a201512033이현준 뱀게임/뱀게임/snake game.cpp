#include <windows.h>
#include "resource.h"
typedef struct {
	int x;
	int y;
} Tail;//������ ��ǥ�� ���� 
typedef struct {
	int bx;
	int by;
} BTail;//������ ��ǥ�� ���� 
Tail t[100];        //�������̹迭
int tail_num;
int x1, y1, x2, y2; //�Ķ��� x2,y2��ǥ ����
BTail boss;         //���� ��ǥ
int bossmove, bosscoming = 0;
int effect = 10;    //�Ķ����� ���� ȿ�� ����
int blue_star;     //�Ķ��� ��������
int speed = 100;    //���� ���ǵ��� ����ȭ
int score = 0;      //ó�� ���ھ� ����
BOOL right = true, left, up, down;
static int time;
LRESULT CALLBACK WndProc(HWND hWnd, UINT msg, WPARAM wParam, LPARAM lParam);
void bump(HWND);     //�浹
void draw(HWND);     //�׸�
void win(HWND);      //�¸�
HINSTANCE g_hInst;
LPSTR lpszClass = "�����";
int APIENTRY WinMain(HINSTANCE hInstance, HINSTANCE hPrevInstance, LPSTR lpszCmdParam, int nCmdShow)
{
	HWND hWnd;
	MSG Message;
	WNDCLASS v; //Ŭ�����̸� V 
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
		SetTimer(hWnd, 1, speed, NULL);//���ӽ��ǵ� 
		SetTimer(hWnd, 2, 1000, NULL);//���Ӱ���ð�		
		while ((x1 = rand()) < 55 || x1 > 570); //����
		while ((y1 = rand()) < 55 || y1 > 460); //����
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
		case 0x50: //P �Ͻ�����
			KillTimer(hWnd, 1); // ���ӽ��ǵ�
			KillTimer(hWnd, 2); //���Ӱ���ð�
			KillTimer(hWnd, 3); //����
			break;
		case 0x53://S �Ͻ����� �׸�!
			SetTimer(hWnd, 1, speed, NULL);//���ӽ��ǵ� 
			SetTimer(hWnd, 2, 1000, NULL);//���Ӱ���ð�		
			SetTimer(hWnd, 3, 400, NULL);//����
			break;
		case 0x52://R �ٽ� ����
			InvalidateRect(hWnd, NULL, TRUE);
			boss.bx = 285, boss.by = 230;  //���� ���� ��ǥ
			SetTimer(hWnd, 1, speed, NULL);//���ӽ��ǵ� 
			SetTimer(hWnd, 2, 1000, NULL);//���Ӱ���ð�		
			SetTimer(hWnd, 3, 400, NULL);//����
			time = 0;  //���� Ÿ��
			score = 0; //���� ����
			while ((x1 = rand()) < 55 || x1 > 570);
			while ((y1 = rand()) < 55 || y1 > 460);
			down = false, right = false, left = false, up = false;   //�����̸��ϰԼ���
			t[0].x = 50;  //��ǥ�� ������ �ʱ�ȭ ���� 
			t[0].y = 50;
			right = true;
			tail_num = 0;
		}
		return 0;
	case WM_TIMER://�̵��Ÿ��ð�����
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
			for (int i = 1; i <= tail_num; i++)//�Ӹ��� ������� �浹ó�� 
			{
				if (t[0].x == t[i].x && t[0].y == t[i].y)
					bump(hWnd);
			}
			if ((t[0].x + 10 > x1 && t[0].x < x1 + 40) && (t[0].y + 10 > y1 && t[0].y < y1 + 40))//���̿��� �浹ó��
			{
				tail_num++;//��������
				while ((x1 = rand()) < 55 || x1 > 570);
				while ((y1 = rand()) < 55 || y1 > 460);
				score = score + 150;
				blue_star = rand();
				if ((blue_star % 3) == 0)  //��������� �Ծ����� 1/3Ȯ���� Ȳ�ݻ�� ����
				{
					while ((x2 = rand()) < 55 || x2 > 570); //���� �Ķ���
					while ((y2 = rand()) < 55 || y2 > 460); //����  �Ķ���
				}

			}
			if ((t[0].x + 10 > boss.bx && t[0].x < boss.bx + 30) && (t[0].y + 10 > boss.by && t[0].y < boss.by + 30))  //�������� �浹 ó��
			{
				if (tail_num >= 10) //���� ���������� �浹�� ����� �޶���
				{
					score = score + tail_num * 300;
					win(hWnd);
				}
				else
				{
					bump(hWnd);
				}
			}
			if ((t[0].x + 20 > x2 && t[0].x < x2 + 20) && (t[0].y + 20 > y2 && t[0].y < y2 + 20))//�Ķ������� �浹ó��
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
				SetTimer(hWnd, 1, speed, NULL);//���ӽ��ǵ�
				tail_num++;//��������
				x2 = 0;
				y2 = 0;
				score = score + 100;
				blue_star = rand();
				if ((blue_star % 3) == 0)  //�Ķ����� �Ծ����� 1/3Ȯ���� Ȳ�ݻ�� ����
				{
					while ((x2 = rand()) < 55 || x2 > 570); //����  Ȳ�ݻ��
					while ((y2 = rand()) < 55 || y2 > 460); //����  Ȳ�ݻ��
				}
			}
			if (t[0].x >= 590 || t[0].y >= 490 || t[0].x <= 45 || t[0].y <= 45)//���� �浹ó��
			{
				bump(hWnd);
			}
			InvalidateRect(hWnd, NULL, FALSE);
			return 0;
	case 2:
		boss.bx = 285, boss.by = 230; //���� ��ȯ ��ǥ
		bosscoming = 1;
		SetTimer(hWnd, 3, 400, NULL); // ���� �̵��ϴ� �ֱ� Ÿ�̸�
	case 3:
		KillTimer(hWnd, 2); // ���� �������� ������ ���� ����
		bossmove = rand() % 6; //0~5 ���� ���� �߻�
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
	//�浹�� Ÿ�̸Ӹ� ���ֹǷ��ؼ� ������ �����Ų��
	KillTimer(hWnd, 1); // ���ӽ��ǵ�
	KillTimer(hWnd, 2); //���Ӱ���ð�
	KillTimer(hWnd, 3); //����
	if (IDYES == MessageBox(hWnd, "������ ����Ǿ����ϴ�. �ٽ� �����Ͻðڽ��ϱ�?", "�� ����", MB_YESNO))
	{
		InvalidateRect(hWnd, NULL, TRUE);
		boss.bx = 285, boss.by = 230;  //���� ���� ��ǥ
		SetTimer(hWnd, 1, speed, NULL);//���ӽ��ǵ� 
		SetTimer(hWnd, 2, 1000, NULL);//���Ӱ���ð�		
		SetTimer(hWnd, 3, 400, NULL);//����
		time = 0;  //���� Ÿ��
		score = 0; //���� ����
		while ((x1 = rand()) < 55 || x1 > 570);
		while ((y1 = rand()) < 55 || y1 > 460);
		down = false, right = false, left = false, up = false;   //�����̸��ϰԼ���
		t[0].x = 50;  //��ǥ�� ������ �ʱ�ȭ ���� 
		t[0].y = 50;
		right = true;
		tail_num = 0;
	}
	else //no ������ ����
		exit(0);
}
void win(HWND hWnd)
{
	KillTimer(hWnd, 1); // ���ӽ��ǵ�
	KillTimer(hWnd, 2); //���Ӱ���ð�
	KillTimer(hWnd, 3); //����
	if (IDYES == MessageBox(hWnd, "������ �����ƽ��ϴ�. �¸��ϼ̽��ϴ�. �ٽ� �Ͻðڽ��ϱ�?", "Win", MB_YESNO))
	{
		InvalidateRect(hWnd, NULL, TRUE);
		boss.bx = 285, boss.by = 230;  //���� ���� ��ǥ
		SetTimer(hWnd, 1, speed, NULL);//���ӽ��ǵ� 
		SetTimer(hWnd, 2, 1000, NULL);//���Ӱ���ð�		
		SetTimer(hWnd, 3, 400, NULL);//����
		time = 0;  //���� Ÿ��
		score = 0; //���� ����
		while ((x1 = rand()) < 55 || x1 > 570);
		while ((y1 = rand()) < 55 || y1 > 460);
		down = false, right = false, left = false, up = false;   //�����̸��ϰԼ���
		t[0].x = 50;  //��ǥ�� ������ �ʱ�ȭ ���� 
		t[0].y = 50;
		right = true;
		tail_num = 0;
	}
	else //no ������ ����
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
	wsprintf(msg, "���� : %d ��", score);
	TextOut(hdc, 620, 50, msg, strlen(msg));
	wsprintf(temp1, "�ð� = %3d��", time / 10);
	TextOut(hdc, 620, 70, temp1, strlen(temp1));
	wsprintf(temp2, "�첿�� = %d", tail_num);
	TextOut(hdc, 620, 90, temp2, strlen(temp2));
	TextOut(hdc, 650, 110, TEXT("-���ӹ��-"), 10);
	TextOut(hdc, 620, 130, TEXT("P:�Ͻ�����  S:�Ͻ����� ��ü"), 27);
	TextOut(hdc, 620, 150, TEXT("R:�ٽ� ���� "), 11);
	TextOut(hdc, 620, 180, TEXT("�첿���� 10���̻�� ����óġ ����"), 33);
	TextOut(hdc, 620, 200, TEXT("���������� ���� �Դ� �����Դϴ�"), 31);
	TextOut(hdc, 620, 250, TEXT("���� ������ 1/3�� Ȯ����"), 24);
	TextOut(hdc, 620, 270, TEXT("�Ķ����� ������ �˴ϴ�"), 22);
	TextOut(hdc, 620, 320, TEXT("�Ķ����� Ư���� ȿ���� �ֽ��ϴ�!"), 31);
	TextOut(hdc, 650, 370, TEXT("-����-"), 6);
	TextOut(hdc, 620, 390, TEXT("�� : 150��"), 10);
	TextOut(hdc, 620, 410, TEXT("�Ķ��� : �⺻100��"), 18);
	TextOut(hdc, 620, 450, TEXT("-------------------------------------------"), 43);
	TextOut(hdc, 620, 490, TEXT("-------------------------------------------"), 43);
	switch (effect)
	{
	case 0: TextOut(hdc, 620, 470, TEXT("������ �ϳ� �����߽��ϴ�!"), 25);
		break;
	case 1: TextOut(hdc, 620, 470, TEXT("������ �ϳ� �����߽��ϴ�!"), 25);
		break;
	case 2: TextOut(hdc, 620, 470, TEXT("���� �ΰ��� �����߽��ϴ�"), 24);
		break;
	case 3: TextOut(hdc, 620, 470, TEXT("�ӵ��� �����Ͽ����ϴ�!!"), 23);
		break;
	case 4: TextOut(hdc, 620, 470, TEXT("�ӵ��� �����Ͽ����ϴ�!!"), 23);
		break;
	case 5: TextOut(hdc, 620, 470, TEXT("���� 500�� ���!"), 16);
		break;
	case 6: TextOut(hdc, 620, 470, TEXT("���� 300�� ����.."), 17);
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
		{//�����κ��� �׷���
			MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP5));
			OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
			BitBlt(hdc, t[i].x, t[i].y, 20 + t[i].x, 20 + t[i].y, MemDC, 0, 0, SRCCOPY);
		}
	}
	MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP6));//����
	OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
	BitBlt(hdc, x1, y1, 30 + x1, 30 + y1, MemDC, 0, 0, SRCCOPY);

	MyBitmap = LoadBitmap(g_hInst, MAKEINTRESOURCE(IDB_BITMAP7));
	OldBitmap = (HBITMAP)SelectObject(MemDC, MyBitmap);
	BitBlt(hdc, x2, y2, x2 + 50, y2 + 50, MemDC, 0, 0, SRCCOPY);

	SelectObject(MemDC, OldBitmap);
	DeleteObject(MyBitmap);
	EndPaint(hWnd, &ps);
}
