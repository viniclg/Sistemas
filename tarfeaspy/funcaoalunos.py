def add_aluno():

    quantd = int(input("digite quantos alunos você quer adicionar "))

count = 0
while count < quantd:
    nome = input("Insira o nome do aluno: ")
    nota = float(input("Insira a nota do aluno: "))
    count += 1

alunos[nome] = nota

def consulta_nota(nome):
    nome = input("Insira o nome do aluno: ")

    # Verifica se o nome do aluno existe e retorna a nota
    if nome in alunos:
        print("A nota do aluno {} é {}".format(nome, alunos[nome]))
    else:
        print("Aluno não encontrado!")

        def mediaturma():
            soma = 0
            qntdalunos = 0
            for nota in alunos.values():
                soma = soma + nota
                qntdalunos = qntdalunos + 1

        media = soma / qntd_alunos
        print("A média da turma é {}".format(media))

        def gravar_arquivo():
            # Abrindo o arquivo para escrita
            arquivo = open("alunos.txt", "w")

            # Escrevendo os dados no arquivo
            for nome, nota in alunos.items():
                arquivo.write("{}={}\n".format(nome, nota))


