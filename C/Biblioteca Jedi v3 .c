/*********************************************************************************************************
* Data: 11/06/2024                                                                                       *
* Autor: Dimitrius Khouri Mariano dos Santos                                                             *
* Descrição: O programa simula um sistema de cadastro e gerenciamento de livros em uma biblioteca com um *
*            menu interativo que permite aos usuários cadastrar, listar, buscar, editar e apagar livros. *
*********************************************************************************************************/


#include <stdio.h>
#include <locale.h>
#include <string.h>
#include <stdlib.h>

#define LIMITE_LIVROS 600
#define TAMANHO_TITULO 200
#define TAMANHO_AUTOR 200
#define TAMANHO_ISBN 50

char titulos[LIMITE_LIVROS][TAMANHO_TITULO];
char autores[LIMITE_LIVROS][TAMANHO_AUTOR];
int isbns[LIMITE_LIVROS];
int total_livros = 0;

void menuPrimario() {
    printf("\n************************************************************************\n");
    printf("\n*********************** BIBLIOTECA ARQUIVOS JEDI ***********************\n");
    printf("\n************************************************************************\n");
    printf("\nBem vindo aos ARQUIVOS JEDI, a maior biblioteca de toda a galáxia!\n");
    printf("Aqui você terá acesso a uma vasta quantidade de livros pertencentes\nao Templo Jedi em Coruscant.\n");
    printf("Para isso, basta escolher uma das opções abaixo:\n \n");
    printf("\n1 - Cadastrar livro\n");
    printf("2 - Listar livros\n");
    printf("3 - Buscar livro\n");
    printf("4 - Alterar livro\n");
    printf("5 - Apagar livro\n");
    printf("0 - Sair\n");
}

void cadastrarLivros() {
    char escolha;

    do {
        setlocale(LC_ALL, "Portuguese");

        printf("\n%iº Livro ", total_livros + 1);

        printf("\nTítulo do livro: ");
        fgets(titulos[total_livros], TAMANHO_TITULO, stdin);
        titulos[total_livros][strcspn(titulos[total_livros], "\n")] = '\0';

        printf("Nome do autor: ");
        fgets(autores[total_livros], TAMANHO_AUTOR, stdin);
        autores[total_livros][strcspn(autores[total_livros], "\n")] = '\0';

        printf("ISBN: ");
        scanf("%d", &isbns[total_livros]);

        printf("\nSeu livro foi cadastrado em nossos arquivos com sucesso, jedi!\n");

        total_livros++;

        printf("\nDeseja cadastrar outro livro? [S/N] ");
        scanf(" %c", &escolha);
        while (getchar() != '\n');

        while (escolha != 'N' && escolha != 'n' && escolha != 'S' && escolha != 's') {
            printf("\n\nSinto muito, mas a opção digitada é inválida, jedi! \n");
            printf("Por favor, digite S para 'Sim' ou N para 'Não'.\n \n");
            printf("\nDeseja cadastrar outro livro? [S/N] ");
            scanf(" %c", &escolha);
            while (getchar() != '\n');
        }
    } while(escolha == 'S' || escolha == 's');
}

void listarLivros() {
    setlocale(LC_ALL, "Portuguese");

    int i, j;
    int tempISBN;
    char tempTitulo[TAMANHO_TITULO];
    char tempAutor[TAMANHO_AUTOR];

    for (i = 0; i < total_livros - 1; i++) {
        for (j = 0; j < total_livros - i - 1; j++) {
            if (isbns[j] > isbns[j + 1]) {
                tempISBN = isbns[j];
                isbns[j] = isbns[j + 1];
                isbns[j + 1] = tempISBN;

                strcpy(tempTitulo, titulos[j]);
                strcpy(titulos[j], titulos[j + 1]);
                strcpy(titulos[j + 1], tempTitulo);

                strcpy(tempAutor, autores[j]);
                strcpy(autores[j], autores[j + 1]);
                strcpy(autores[j + 1], tempAutor);
            }
        }
    }

    for (i = 0; i < total_livros; i++) {
        printf("\nLivro %d \n", i + 1);
        printf("Título: %s\n", titulos[i]);
        printf("Autor: %s\n", autores[i]);
        printf("ISBN: %d\n", isbns[i]);
        printf("\n");
    }
}

void buscarLivros() {
    char titulo_procurado[TAMANHO_TITULO];
    char escolha;

    do {
        int livro_localizado = 0, i = 0;
        setlocale(LC_ALL, "Portuguese");

        printf("\nDigite o título do livro que deseja encontrar: ");
        fgets(titulo_procurado, sizeof(titulo_procurado), stdin);
        titulo_procurado[strcspn(titulo_procurado, "\n")] = '\0';

        for (i = 0; i < total_livros; i++) {
            if (strcmp(titulos[i], titulo_procurado) == 0) {
                printf("\nO seguinte livro foi localizado: \n");
                printf("\nTítulo: %s\n", titulos[i]);
                printf("Autor: %s\n", autores[i]);
                printf("ISBN: %d\n\n", isbns[i]);
                livro_localizado = 1;
                break;
            }
        }

        if (!livro_localizado) {
            printf("\nSinto muito, jedi, esse livro ainda não foi cadastrado.\n");
        }

        printf("\nDeseja procurar outro livro? [S/N] ");
        scanf(" %c", &escolha);
        while (getchar() != '\n');

        while (escolha != 'N' && escolha != 'n' && escolha != 'S' && escolha != 's') {
            printf("\n\nSinto muito, mas a opção digitada é inválida, jedi! \n");
            printf("Por favor, digite S para 'Sim' ou N para 'Não'.\n \n");
            printf("\nDeseja procurar outro livro? [S/N] ");
            scanf(" %c", &escolha);
            while (getchar() != '\n');
        }
    } while(escolha == 'S' || escolha == 's');
}

void editarLivros() {
    char livro_editado[TAMANHO_TITULO];
    char escolha;
    int i = 0;

    do {
        setlocale(LC_ALL, "Portuguese");

        printf("\nDigite o título do livro que deseja editar: ");
        fgets(livro_editado, sizeof(livro_editado), stdin);
        livro_editado[strcspn(livro_editado, "\n")] = '\0';

        int indice = -1;

        for (i = 0; i < total_livros; i++) {
            if (strcmp(titulos[i], livro_editado) == 0) {
                indice = i;
                break;
            }
        }

        if (indice == -1) {
            printf("\nSinto muito, jedi, esse livro ainda não foi cadastrado.\n");
        } else {
            printf("\nDigite o novo título do livro: ");
            fgets(titulos[indice], sizeof(titulos[indice]), stdin);
            titulos[indice][strcspn(titulos[indice], "\n")] = '\0';

            printf("Digite o novo autor do livro: ");
            fgets(autores[indice], sizeof(autores[indice]), stdin);
            autores[indice][strcspn(autores[indice], "\n")] = '\0';

            printf("Digite o novo ISBN do livro: ");
            scanf("%d", &isbns[indice]);

            printf("\nO seu livro foi editado com sucesso, Jedi!\n\n");
        }

        printf("\nDeseja editar outro livro? [S/N] ");
        scanf(" %c", &escolha);
        while (getchar() != '\n');

        while (escolha != 'N' && escolha != 'n' && escolha != 'S' && escolha != 's') {
            printf("\n\nSinto muito, mas a opção digitada é inválida, jedi! \n");
            printf("Por favor, digite S para 'Sim' ou N para 'Não'.\n \n");
            printf("\nDeseja editar outro livro? [S/N] ");
            scanf(" %c", &escolha);
            while (getchar() != '\n');
        }
    } while(escolha == 'S' || escolha == 's');
}

void apagarLivros() {
    char titulo_buscado[TAMANHO_TITULO];
    char escolha;
    int i = 0;

    do {
        int livro_apagado = 0;
        setlocale(LC_ALL, "Portuguese");

        printf("\nLivros: \n");
        listarLivros();

        printf("\nDigite o título do livro que deseja apagar: ");
        fgets(titulo_buscado, sizeof(titulo_buscado), stdin);
        titulo_buscado[strcspn(titulo_buscado, "\n")] = '\0';

        for (i = 0; i < total_livros; i++) {
            if (strcmp(titulos[i], titulo_buscado) == 0) {
                int j;
                for (j = i; j < total_livros - 1; j++) {
                    strcpy(titulos[j], titulos[j + 1]);
                    strcpy(autores[j], autores[j + 1]);
                    isbns[j] = isbns[j + 1];
                }
                total_livros--;
                printf("\nO livro foi apagado com sucesso, Jedi! \n");
                livro_apagado = 1;
                break;
            }
        }
        if (!livro_apagado) {
            printf("Sinto muito, jedi. Mas esse livro não foi localizado.\n");
        }
        printf("\nDeseja apagar outro livro? [S/N] ");
        scanf(" %c", &escolha);
        while (getchar() != '\n');

        while (escolha != 'N' && escolha != 'n' && escolha != 'S' && escolha != 's') {
            printf("\n\nSinto muito, mas a opção digitada é inválida, jedi! \n");
            printf("Por favor, digite S para 'Sim' ou N para 'Não'.\n \n");
            printf("\nDeseja apagar outro livro? [S/N] ");
            scanf(" %c", &escolha);
            while (getchar() != '\n');
        }
    } while(escolha == 'S' || escolha == 's');

}

int main() {
    setlocale(LC_ALL, "Portuguese");

    int opcao;

    do {
        system("cls");
        menuPrimario();

        printf("\nOpção desejada: ");
        scanf("%d", &opcao);
        while (getchar() != '\n');

        if (opcao < 0 || opcao > 5) {
            printf("\nSinto muito, mas a opção digitada é inválida, jedi! ");
            printf("\nPor favor, tente novamente. \n");
            system("pause");
        } else {
            system("cls");

            switch (opcao) {

                case 1:
                    printf("\n-----------<<< Cadastro de Livros >>>----------- \n");
                    cadastrarLivros();
                    break;

                case 2:
                    printf("\n-----------<<< Livros Cadastrados >>>----------- \n");
                    if (total_livros == 0) {
                        printf("\nAté agora NÃO HÁ livro cadastrado, Jedi!\n\n");
                    } else {
                        listarLivros();
                    }
                    system("pause");
                    break;
                case 3:
                    printf("\n--------<<< Buscar Livros Cadastrados >>>-------- \n");
                    if (total_livros == 0) {
                        printf("\nNão é possível PROCURAR por livros, pois a biblioteca encontra-se vazia, Jedi!\n\n");
                    } else {
                        buscarLivros();
                    }
                    system("pause");
                    break;
                case 4:
                    printf("\n--------<<< Editar Livros Cadastrados >>>-------- \n");
                    if (total_livros == 0) {
                        printf("\nNão é possível EDITAR livros, pois AINDA NÃO HÁ livros cadastrados, Jedi!\n\n");
                    } else {
                        editarLivros();
                    }
                    system("pause");
                    break;
                case 5:
                    printf("\n--------<<< Apagar Livros Cadastrados >>>-------- \n");
                    if (total_livros == 0) {
                        printf("\nNão é possível APAGAR livros, pois AINDA NÃO HÁ livros cadastrados, Jedi!\n\n");
                    } else {
                        apagarLivros();
                    }
                    system("pause");
                    break;
                }
        }
    } while (opcao != 0);
    printf("\nObrigado por utilizar o nosso programa!\n\n");
    printf("\nQualquer problema, por favor, entre em contato com a Bibliotecária Chefe Jocasta Nu.\n\n");
    printf("\nQue a força esteja com você!\n\n");
    system("pause");
}
