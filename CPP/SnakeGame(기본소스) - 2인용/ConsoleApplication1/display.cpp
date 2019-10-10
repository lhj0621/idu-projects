#include <iostream>
#include <cstdlib>
#include "display.h"
 
// 생성자()
//
Display::Display() : max_x_(79), max_y_(24) {} //가로, 세로값 넣기.
 
// max_x()
//
const int Display::max_x() const		//게임판의 가로좌표 리턴
{
    return max_x_;
}
 
// max_y()
//
const int Display::max_y() const		//게임판의 세로좌표 리턴
{
    return max_y_;
}
 
// print_prompt()
// ... 주어진 메세지를 화면의 중앙에 출력한다.
//
void Display::print_prompt(const char *msg)
{
    go_to_xy(0, 10);
    for (int i = 0; i < 80; i++)
        printf("-");
 
    go_to_xy(0, 12);
    for (int i = 0; i < 80; i++)
        printf("-");
 
    go_to_xy(40 - strlen(msg)/2, 11);
    printf("%s", msg);
}
 
// print_wall()
// ... 뱀이 벗어날 수 없는 범위인 벽을 출력한다.
//
void Display::print_wall()
{
    // 게임화면의 네 꼭지점을 출력한다.
    putchar_at_xy(0, 0, '+');
    putchar_at_xy(max_x(), 0, '+');
    putchar_at_xy(0, max_y(), '+');
    putchar_at_xy(max_x(), max_y(), '+');
 
    // 상단 가로줄을 출력한다.
    for (int x = 1, y = 0; x < max_x(); x++)
        putchar_at_xy(x, y, '-');
 
    // 하단 가로줄을 출력한다.
    for (int x = 1, y = max_y(); x < max_x(); x++)
        putchar_at_xy(x, y, '-');
 
    // 좌측 세로줄을 출력한다.
    for (int x = 0, y = 1; y < max_y(); y++)
        putchar_at_xy(x, y, '|');
 
    // 우측 세로줄을 출력한다.
    for (int x = max_x(), y = 1; y < max_y(); y++)
        putchar_at_xy(x, y, '|');
}
 
// print_food()
// ... 입력받은 위치에 뱀의 먹이를 출력한다.
//
void Display::print_food(Position pos) //매개변수로 보내진 좌표에 아이템 출력
{
	putchar_at_xy(pos.X, pos.Y, '*');
}
//입력받은 위치에서 장애물을 출력한다.
void Display::print_obstacle(Position pos) //매개변수로 보내진 좌표에 장애물 출력
{
	putchar_at_xy(pos.X, pos.Y, '#');
}
 
// print_snake()
// ... 뱀 모양을 화면에 출력한다.
//
void Display::print_snake(Snake snake)
{
    list<Position>::const_iterator iter1 = snake.body1().begin();
	list<Position>::const_iterator iter2 = snake.body2().begin();
    // 뱀의 머리를 출력한다.
    putchar_at_xy(iter1->X, iter1->Y, '@');
	putchar_at_xy(iter2->X, iter2->Y, '@');
    // 뱀의 몸통을 출력한다.
    while (++iter1 != snake.body1().end())
        putchar_at_xy(iter1->X, iter1->Y, 'o');

	while (++iter2 != snake.body2().end())
		putchar_at_xy(iter2->X, iter2->Y, 'o');
}
 
// clear()
// ... 게임화면을 깨끗이 지운다.
//
void Display::clear()
{
    system("cls");
}
