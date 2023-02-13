
alunos = {

}

count = 0

while count < 3:
    nome = input("Digite o nome do aluno: ")
    nota = float(input("digite sua nota"))

    alunos[nome] = nota

    count += 1

for x in alunos.values():
    x = x + x

print(x)
print(alunos.values())
med = (x / len(alunos.values()))

print(med)
print(alunos)