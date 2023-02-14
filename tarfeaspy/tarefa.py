
alunos = {}

x = int(input("MENU, ESCOLHA UMA OPÇÃO"
      "\n1. adicionar alunos"
      "\n2.consultar alunos"
      "\n3.exibir a média da turma: "))

if(x == 1):

    qtd = int(input("digite quantos alunos você quer adicionar "))

    count = 0

    while count < qtd:
        nome = input("Insira o nome do aluno: ")
        nota = float(input("Insira a nota do aluno: "))
        count += 1


        alunos[nome] = nota

 # Abrindo o arquivo para escrita
arquivo = open("alunos.txt", "w")

# Escrevendo os dados no arquivo
for nome, nota in alunos.items():
    arquivo.write("{}={}\n".format(nome, nota))

if(x == 2):

    nome = input("Insira o nome do aluno: ")

    # Verifica se o nome do aluno existe e retorna a nota
    if nome in alunos:
        print("A nota do aluno {} é {}".format(nome, alunos[nome]))
    else:
        print("Aluno não encontrado!")