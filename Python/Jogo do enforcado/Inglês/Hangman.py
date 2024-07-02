import hangman_art
from os import system
from hangman_words import word_list
from random import choice


print('-=-' * 20)
print(hangman_art.logo)
print('-=-' * 20)

guess_letters = list()
lives = 6
chosen_word = choice(word_list)
display = list()

for _ in range(len(chosen_word)):
    display += '_'

while True:
    print('')
    guess = input('Guess a letter: ').lower()
    system('cls')
    if guess in display:
        print('-' * 60)
        print(f"You've already tried the letter '{guess}'. Try another.")
    else:
        if guess in chosen_word:
            guess_letters.append(guess)
            for position, letter in enumerate(chosen_word):
                if letter == guess:
                    display[position] = letter
        else:
            if guess not in guess_letters:
                lives -= 1
                guess_letters.append(guess)
                print('-' * 60)
                print('Wrong guess!')
                print('You lose a life!')
                print('Try again.')
                print('-' * 60)
            else:
                print('-' * 60)
                print(f"You already try the letter '{guess}'. Try again.")
                print('-' * 60)
    print('Life:', '♡' * lives)
    print(hangman_art.stages[lives])
    print(f"{' '.join(display)}")
    print('-' * 60)
    print(f'You already tried : {guess_letters}')
    print('-' * 60)
    if '_' not in display:
        print('-=' * 20)
        print(hangman_art.win)
        break
    if lives == 0:
        print('-=' * 20)
        print(hangman_art.lose)
        break

print('-=' * 20)
