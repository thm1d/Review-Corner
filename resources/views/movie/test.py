from sys import exit

def gold_room():
    print('This room is full of Gold, how much do you take? ')

    choice = input('> ')

    if '0' in choice or '1' in choice:
        how_much = int(choice)
    else:
        dead('man, learn to type a number ')

    if how_much < 50:
        print('nice, you are not greedy, you win ')
        exit(0)
    else:
        dead('you are greedy ')

def bear_room():
    print('There is a bear here')
    print('The bear has a bunch of honey')
    print('The fat bear is in front of another door')
    print('How are you going to move the door? ')
    bear_moved = False

    while True:
        choice = input('> ')

        if choice == 'take honey':
            dead('The bear looks at you and slaps your face ')
        elif choice == 'taunt bear' and not bear_moved:
            print('The bear has moved from the door')
            print('You can go through now ')
            bear_moved = True

        elif choice == 'taunt bear' and bear_moved:
            dead('The bear is pissed and chewed your head off ')
        elif choice == 'open door':
            gold_room()

def dead(msg):
    print(msg + ' Good job')

bear_room()