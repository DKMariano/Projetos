import hangman_art
from os import system
from hangman_words import lista_palavras
from random import choice

print('-=' * 30)
print(hangman_art.logo_pt)
print('-=' * 30)
letras_usadas = list()
vidas = 6
palavra_escolhida = choice(lista_palavras)
exibicao = list()

for _ in range(len(palavra_escolhida)):
    exibicao += '_'
while True:
    print('')
    palpite = input('Tente advinhar uma letra: ').lower()
    system('cls')
    if palpite in exibicao:
        print('-' * 90)
        print(f"Você já tentou a letra '{palpite}'. Tente outra.")
        print('-' * 90)
    else:
        if palpite in palavra_escolhida:
            letras_usadas.append(palpite)
            for posicao, letra in enumerate(palavra_escolhida):
                if letra == palpite:
                    exibicao[posicao] = letra
        else:
            if palpite not in letras_usadas:
                vidas -= 1
                letras_usadas.append(palpite)
                print('-' * 60)
                print("Letra errada!")
                print('Você perdeu uma vida!')
                print('Tente novamente.')
                print('-' * 60)
            else:
                print('-' * 60)
                print(f"Você já tentou a letra '{palpite}'. Tente outra.")
                print('-' * 60)
    print('Vidas:', '♡' * vidas)
    print(hangman_art.stages[vidas])
    print(f"{' '.join(exibicao)}")
    print('-' * 60)
    print(f'Você já tentou : \n'
          f'{letras_usadas}')
    print('-' * 60)
    if '_' not in exibicao:
        print('-=' * 20)
        print(hangman_art.vitoria)
        break
    if vidas == 0:
        print('-=' * 20)
        print(hangman_art.derrota)
        print(f"A palavra era '{palavra_escolhida}'.")
        break
print('-=' * 20)
