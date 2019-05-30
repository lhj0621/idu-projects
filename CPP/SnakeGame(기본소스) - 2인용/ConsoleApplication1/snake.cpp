#include "snake.h"

// ������()
//
Snake::Snake()
{
	initialize();  //�� ���� �ʱ�ȭ �Լ�
}

// head()
// ... �� �Ӹ��� ��ġ�� ��ȯ�Ѵ�.
//
const Position Snake::head1() const
{
	return body_1.front();	//�� list�� �պκ� ��ǥ ����
}

// tail()
// ... �� ���� �� �� ��ġ�� ��ȯ�Ѵ�.
//
const Position Snake::tail1() const
{
	return body_1.back();	//�� list�� �޺κ� ��ǥ ����
}

// body()
// ... �� ��ü�� ��ġ�� ����ִ� list�� ��ȯ�Ѵ�.
//
list<Position>& Snake::body1()
{
	return body_1;			//�� list�� ��ü ��ġ������ ����
}

// body()
// ... �� ��ü�� ��ġ�� ����ִ� list�� �����ü�� ��ȯ�Ѵ�.
//
const list<Position> Snake::body1() const
{
	return body_1;
}

const Position Snake::head2() const
{
	return body_2.front();	//�� list�� �պκ� ��ǥ ����
}
// tail()
// ... �� ���� �� �� ��ġ�� ��ȯ�Ѵ�.
//
const Position Snake::tail2() const
{
	return body_2.back();	//�� list�� �޺κ� ��ǥ ����
}

// body()
// ... �� ��ü�� ��ġ�� ����ִ� list�� ��ȯ�Ѵ�.
//
list<Position>& Snake::body2()
{
	return body_2;			//�� list�� ��ü ��ġ������ ����
}

// body()
// ... �� ��ü�� ��ġ�� ����ִ� list�� �����ü�� ��ȯ�Ѵ�.
//
const list<Position> Snake::body2() const
{
	return body_2;
}
// initialize()
// ... �� ��ü ������ �ʱ�ȭ�Ѵ�.
//
void Snake::initialize()
{
	body_1.clear();		//�� list�� ����.

	Position pos1[2] = { {40, 12}, {40, 13} };
	body_1.push_front(pos1[0]);
	body_1.push_back(pos1[1]);
	direction_1 = UP;	 //���� �ʱ� ������� �Լ�
	body_2.clear();		//�� list�� ����.
	Position pos2[2] = { { 10, 12 },{ 10, 13 } };
	body_2.push_front(pos2[0]);
	body_2.push_back(pos2[1]);
	direction_2 = 'w';
}

// set_direction()
// ... ���� �����̴� ������ �����Ѵ�.
//
void Snake::set_direction1(Keyboard key)
{
	// ���� ������⿡�� ���ݴ�������δ� ������ȯ�� �Ҽ� ����.
	if (direction_1 == UP && key == DOWN) return;		//���� ��������� ��, ����ڰ� �Ʒ�Ű �Է½� ��ȭ����
	if (direction_1 == DOWN && key == UP) return;		//���� ��������� �Ʒ�, ����ڰ� ��Ű �Է½� ��ȭ����
	if (direction_1 == LEFT && key == RIGHT) return;		//���� ��������� ����, ����ڰ� ������Ű �Է½� ��ȭ����
	if (direction_1 == RIGHT && key == LEFT) return;		//���� ��������� ������, ����ڰ� ����Ű �Է½� ��ȭ����
	direction_1 = key;


}
void Snake::set_direction2(Keyboard key)
{
	if (direction_2 == 'w' && key == 's') return;		//���� ��������� ��, ����ڰ� �Ʒ�Ű �Է½� ��ȭ����
	if (direction_2 == 's' && key == 'w') return;		//���� ��������� �Ʒ�, ����ڰ� ��Ű �Է½� ��ȭ����
	if (direction_2 == 'a' && key == 'd') return;		//���� ��������� ����, ����ڰ� ������Ű �Է½� ��ȭ����
	if (direction_2 == 'd' && key == 'a') return;		//���� ��������� ������, ����ڰ� ����Ű �Է½� ��ȭ����
	direction_2 = key;
}

// move()
// ... ������ �Ӹ��� �������� �ٲپ� ����ϰ�
// ... ������⿡ ���� �˸´� move�Լ��� ȣ���Ѵ�.
//
void Snake::move1()
{
	putchar_at_xy(head1().X, head1().Y, '0');
	switch (direction_1)
	{
	case UP:    move_up1();    break;		//���� ������ ���� ����	
	case DOWN:  move_down1();  break;		//���� ������ �Ʒ��� ����
	case LEFT:  move_left1();  break;		//���� ������ �������� ����
	case RIGHT: move_right1(); break;		//���� ������ �������� ����
	}
}
void Snake::move2() {
	putchar_at_xy(head2().X, head2().Y, 'O');
	switch (direction_2)
	{
	case 'w':    move_up2();  break;		//���� ������ ���� ����	
	case 's':  move_down2();  break;		//���� ������ �Ʒ��� ����
	case 'a':  move_left2();  break;		//���� ������ �������� ����
	case 'd': move_right2();  break;		//���� ������ �������� ����
	}
}

// move_up()
//
void Snake::move_up1()
{
	Position new_head = { head1().X, head1().Y - 1 };	//�Ӹ��� ��ǥ�� ���� ��ǥ���� Y-1�� �Ͽ� ���� ����
	body_1.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}

// move_down()
//
void Snake::move_down1()
{
	Position new_head = { head1().X, head1().Y + 1 };	//�Ӹ��� ��ǥ�� ���� ��ǥ���� Y+1�� �Ͽ� �Ʒ��� ����
	body_1.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}

// move_left()
//
void Snake::move_left1()
{
	Position new_head = { head1().X - 1, head1().Y };	 //�Ӹ��� ��ǥ�� ���� ��ǥ���� x-1�� �Ͽ� �������� ����
	body_1.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}

// move_right()
//
void Snake::move_right1()
{
	Position new_head = { head1().X + 1, head1().Y };	 //�Ӹ��� ��ǥ�� ���� ��ǥ���� x+1�� �Ͽ� �������� ����
	body_1.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}
void Snake::move_up2()
{
	Position new_head = { head2().X, head2().Y - 1 };	//�Ӹ��� ��ǥ�� ���� ��ǥ���� Y-1�� �Ͽ� ���� ����
	body_2.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}

// move_down()
//
void Snake::move_down2()
{
	Position new_head = { head2().X, head2().Y + 1 };	//�Ӹ��� ��ǥ�� ���� ��ǥ���� Y+1�� �Ͽ� �Ʒ��� ����
	body_2.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}

// move_left()
//
void Snake::move_left2()
{
	Position new_head = { head2().X - 1, head2().Y };	 //�Ӹ��� ��ǥ�� ���� ��ǥ���� x-1�� �Ͽ� �������� ����
	body_2.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}

// move_right()
//
void Snake::move_right2()
{
	Position new_head = { head2().X + 1, head2().Y };	 //�Ӹ��� ��ǥ�� ���� ��ǥ���� x+1�� �Ͽ� �������� ����
	body_2.push_front(new_head);						//list�� �պκп� ���ο� �Ӹ� ��ǥ�� ����
}
// is_bitten()
// ... ���� �ڱ� ���� �������� true, �ƴϸ� false�� ��ȯ�Ѵ�.
//
bool Snake::is_bitten()
{
	list<Position>::const_iterator iter1 = body_1.begin();
	while (++iter1 != body_1.end())
		if ((iter1->X == head1().X) && (iter1->Y == head1().Y))		//���� �Ӹ��� ������ ��ǥ�� ������ ��
			return true;
	list<Position>::const_iterator iter2 = body_2.begin();
	while (++iter2 != body_2.end())
		if ((iter2->X == head2().X) && (iter2->Y == head2().Y))		//���� �Ӹ��� ������ ��ǥ�� ������ ��
			return true;
	return false;
}