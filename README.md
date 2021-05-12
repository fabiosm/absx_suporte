Sistemas de Gestão de Chamados - ABSX

Frontend: Bootstrap v3.3.7 
Backend: PHP - Laravel 8

- Acesso geral:
    - Permite abrir um chamado.

![image](https://user-images.githubusercontent.com/17435887/117985278-f10ce400-b30e-11eb-83a2-e516862a2100.png)   

- Autenticação usuário comum:
    - Acesso a fila e gestão de chamado
![image](https://user-images.githubusercontent.com/17435887/117986274-db4bee80-b30f-11eb-8073-d8ee4a3b946f.png)

    - Encaminhar chamado para fila de tratamento ou encerrado

![image](https://user-images.githubusercontent.com/17435887/117986334-e7d04700-b30f-11eb-95dd-952f48acb8cb.png)


- Usuário Administrador:
    - Acesso a fila de chamado de todos os usuários
    - Gestão de usuário

![image](https://user-images.githubusercontent.com/17435887/117986462-08000600-b310-11eb-9c60-a25ddcf1d1dd.png)


- Chamados com mais de 24horas serão exibidos como em atraso.
    A listagem do chamado atrasado terá uma cor vermelha e um gif de exclamação ao lado do chamado

- Arquivo de Banco de dados na raiz do sistema: absx.sql

- Acesso via AWS: http://ec2-35-172-137-202.compute-1.amazonaws.com/

- Usuários de acesso para teste: 
	- marcos.absx@mailinator.com 
	- joao.absx@mailinator.com 
    - felipe.absx@mailinator.com 
    - absx.suporte@mailinator.com 

- A senha padrão de todos é: absx.123

- Sugestão de implementações futuras:
    - Usuário poder reabrir chamado;
    - Encaminhar chamado para outro responsável;
    - Emissão de relatório;
    - Envio e recebimento de e-mail pelo sistema;
    - Entra outros;
