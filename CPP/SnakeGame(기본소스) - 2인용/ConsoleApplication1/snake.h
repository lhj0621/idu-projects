#ifndef __SNAKE_H__
#define __SNAKE_H__
 
#include <list>
using namespace std;
 
#include "common.h"
 
class Snake
{
	typedef unsigned int SnakeLengthType;
 
public:
    Snake();
    void initialize();							//�� ��ü ���� �ʱ�ȭ.
    void set_direction1(Keyboard key);			//1.���� �����̴� ������ ����
	void set_direction2(Keyboard key);			//2.���� �����̴� ������ ����
    void move1();								//1.������⿡ ���� �˸´� move�Լ��� ȣ���Ѵ�.
	void move2();								//2.������⿡ ���� �˸´� move�Լ��� ȣ���Ѵ�.
    bool is_bitten();
 
    list<Position>& Snake::body1();				//�� ��ü�� ��ġ�� ����ִ� list�� ��ȯ
    const list<Position> Snake::body1() const;	//�� ��ü�� ��ġ�� ����ִ¤�ist�� �����ü�� ��ȯ
    const Position head1() const;				//�� �Ӹ��� ��ġ�� ��ȯ
	const Position tail1() const;				//�� ������ ��ġ�� ��ȯ

	list<Position>& Snake::body2();				//�� ��ü�� ��ġ�� ����ִ� list�� ��ȯ
	const list<Position> Snake::body2() const;	//�� ��ü�� ��ġ�� ����ִ¤�ist�� �����ü�� ��ȯ
	const Position head2() const;				//�� �Ӹ��� ��ġ�� ��ȯ
	const Position tail2() const;				//�� ������ ��ġ�� ��ȯ
 
private:
    void move_up1();							//���� ������ ���� ����				
    void move_down1();							//���� ������ �Ʒ��� ����
    void move_left1();							//���� ������ �������� ����
    void move_right1();							//���� ������ �������� ����

	void move_up2();							//���� ������ ���� ����				
	void move_down2();							//���� ������ �Ʒ��� ����
	void move_left2();							//���� ������ �������� ����
	void move_right2();							//���� ������ �������� ����

    const int direction() const;
 
private:
    int direction_1;								//����ڷκ��� �Է¹޴� Ű�� ���� ����
	int direction_2;
    list<Position> body_1;						//���Ḯ��Ʈ�� �� ����
	list<Position> body_2;						//���Ḯ��Ʈ�� �� ����
};
 
#endif