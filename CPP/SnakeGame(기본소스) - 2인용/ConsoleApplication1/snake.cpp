#include "snake.h"

// 생성자()
//
Snake::Snake()
{
	initialize();  //뱀 정보 초기화 함수
}

// head()
// ... 뱀 머리의 위치를 반환한다.
//
const Position Snake::head1() const
{
	return body_1.front();	//뱀 list의 앞부분 좌표 리턴
}

// tail()
// ... 뱀 꼬리 맨 끝 위치를 반환한다.
//
const Position Snake::tail1() const
{
	return body_1.back();	//뱀 list의 뒷부분 좌표 리턴
}

// body()
// ... 뱀 전체의 위치를 담고있는 list를 반환한다.
//
list<Position>& Snake::body1()
{
	return body_1;			//뱀 list의 전체 위치정보를 리턴
}

// body()
// ... 뱀 전체의 위치를 담고있는 list를 상수객체로 반환한다.
//
const list<Position> Snake::body1() const
{
	return body_1;
}

const Position Snake::head2() const
{
	return body_2.front();	//뱀 list의 앞부분 좌표 리턴
}
// tail()
// ... 뱀 꼬리 맨 끝 위치를 반환한다.
//
const Position Snake::tail2() const
{
	return body_2.back();	//뱀 list의 뒷부분 좌표 리턴
}

// body()
// ... 뱀 전체의 위치를 담고있는 list를 반환한다.
//
list<Position>& Snake::body2()
{
	return body_2;			//뱀 list의 전체 위치정보를 리턴
}

// body()
// ... 뱀 전체의 위치를 담고있는 list를 상수객체로 반환한다.
//
const list<Position> Snake::body2() const
{
	return body_2;
}
// initialize()
// ... 뱀 전체 정보를 초기화한다.
//
void Snake::initialize()
{
	body_1.clear();		//뱀 list를 비운다.

	Position pos1[2] = { {40, 12}, {40, 13} };
	body_1.push_front(pos1[0]);
	body_1.push_back(pos1[1]);
	direction_1 = UP;	 //뱀의 초기 진행방향 함수
	body_2.clear();		//뱀 list를 비운다.
	Position pos2[2] = { { 10, 12 },{ 10, 13 } };
	body_2.push_front(pos2[0]);
	body_2.push_back(pos2[1]);
	direction_2 = 'w';
}

// set_direction()
// ... 뱀이 움직이는 방향을 설정한다.
//
void Snake::set_direction1(Keyboard key)
{
	// 현재 진행방향에서 정반대방향으로는 방향전환을 할수 없다.
	if (direction_1 == UP && key == DOWN) return;		//현재 진행방향은 위, 사용자가 아래키 입력시 변화없음
	if (direction_1 == DOWN && key == UP) return;		//현재 진행방향은 아래, 사용자가 위키 입력시 변화없음
	if (direction_1 == LEFT && key == RIGHT) return;		//현재 진행방향은 왼쪽, 사용자가 오른쪽키 입력시 변화없음
	if (direction_1 == RIGHT && key == LEFT) return;		//현재 진행방향은 오른쪽, 사용자가 왼쪽키 입력시 변화없음
	direction_1 = key;


}
void Snake::set_direction2(Keyboard key)
{
	if (direction_2 == 'w' && key == 's') return;		//현재 진행방향은 위, 사용자가 아래키 입력시 변화없음
	if (direction_2 == 's' && key == 'w') return;		//현재 진행방향은 아래, 사용자가 위키 입력시 변화없음
	if (direction_2 == 'a' && key == 'd') return;		//현재 진행방향은 왼쪽, 사용자가 오른쪽키 입력시 변화없음
	if (direction_2 == 'd' && key == 'a') return;		//현재 진행방향은 오른쪽, 사용자가 왼쪽키 입력시 변화없음
	direction_2 = key;
}

// move()
// ... 기존의 머리는 몸통으로 바꾸어 출력하고
// ... 진행방향에 따라 알맞는 move함수를 호출한다.
//
void Snake::move1()
{
	putchar_at_xy(head1().X, head1().Y, '0');
	switch (direction_1)
	{
	case UP:    move_up1();    break;		//뱀의 방향을 위로 진행	
	case DOWN:  move_down1();  break;		//뱀의 방향을 아래로 진행
	case LEFT:  move_left1();  break;		//뱀의 방향을 죄측으로 진행
	case RIGHT: move_right1(); break;		//뱀의 방향을 우측으로 진행
	}
}
void Snake::move2() {
	putchar_at_xy(head2().X, head2().Y, 'O');
	switch (direction_2)
	{
	case 'w':    move_up2();  break;		//뱀의 방향을 위로 진행	
	case 's':  move_down2();  break;		//뱀의 방향을 아래로 진행
	case 'a':  move_left2();  break;		//뱀의 방향을 죄측으로 진행
	case 'd': move_right2();  break;		//뱀의 방향을 우측으로 진행
	}
}

// move_up()
//
void Snake::move_up1()
{
	Position new_head = { head1().X, head1().Y - 1 };	//머리의 좌표를 기존 좌표에서 Y-1을 하여 위로 진행
	body_1.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}

// move_down()
//
void Snake::move_down1()
{
	Position new_head = { head1().X, head1().Y + 1 };	//머리의 좌표를 기존 좌표에서 Y+1을 하여 아래로 진행
	body_1.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}

// move_left()
//
void Snake::move_left1()
{
	Position new_head = { head1().X - 1, head1().Y };	 //머리의 좌표를 기존 좌표에서 x-1을 하여 좌측으로 진행
	body_1.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}

// move_right()
//
void Snake::move_right1()
{
	Position new_head = { head1().X + 1, head1().Y };	 //머리의 좌표를 기존 좌표에서 x+1을 하여 우측으로 진행
	body_1.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}
void Snake::move_up2()
{
	Position new_head = { head2().X, head2().Y - 1 };	//머리의 좌표를 기존 좌표에서 Y-1을 하여 위로 진행
	body_2.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}

// move_down()
//
void Snake::move_down2()
{
	Position new_head = { head2().X, head2().Y + 1 };	//머리의 좌표를 기존 좌표에서 Y+1을 하여 아래로 진행
	body_2.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}

// move_left()
//
void Snake::move_left2()
{
	Position new_head = { head2().X - 1, head2().Y };	 //머리의 좌표를 기존 좌표에서 x-1을 하여 좌측으로 진행
	body_2.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}

// move_right()
//
void Snake::move_right2()
{
	Position new_head = { head2().X + 1, head2().Y };	 //머리의 좌표를 기존 좌표에서 x+1을 하여 우측으로 진행
	body_2.push_front(new_head);						//list의 앞부분에 새로운 머리 좌표를 저장
}
// is_bitten()
// ... 뱀이 자기 몸을 물었으면 true, 아니면 false를 반환한다.
//
bool Snake::is_bitten()
{
	list<Position>::const_iterator iter1 = body_1.begin();
	while (++iter1 != body_1.end())
		if ((iter1->X == head1().X) && (iter1->Y == head1().Y))		//뱀의 머리가 몸통의 좌표와 같은지 비교
			return true;
	list<Position>::const_iterator iter2 = body_2.begin();
	while (++iter2 != body_2.end())
		if ((iter2->X == head2().X) && (iter2->Y == head2().Y))		//뱀의 머리가 몸통의 좌표와 같은지 비교
			return true;
	return false;
}