//Join com duas tabelas
select p.id, p.nome, ptc.participante_id, ptc.curso_id from participante p join participante_tem_curso ptc on p.id=ptc.participante_id

select p.id, p.nome, ptc.participante_id, ptc.curso_id, c.nome, c.id from participante p join participante_tem_curso ptc on p.id=ptc.participante_id join curso c on c.id=ptc.curso_id

//Consulta pronta
select p.cpf, p.nome, c.nome as curso from participante p join participante_tem_curso ptc on p.id=ptc.participante_id join curso c on c.id=ptc.curso_id order by p.nome

//Consulta Emissão de Certificados
select p.cpf, p.nome, c.nome as curso from participante p join participante_tem_curso ptc on p.id=ptc.participante_id join curso c on c.id=ptc.curso_id where p.cpf like '046.028.433-95' order by p.nome

select p.cpf, p.nome, c.nome as curso, c.ch, c.inicio, c.fim, e.nome as evento from participante p 
            join participante_tem_curso ptc on p.id=ptc.participante_id 
            join curso c on c.id=ptc.curso_id
            join evento e on e.id=ptc.evento_id where e.id in (select i.nome from instituicao where i.id=e.instituicao_id) p.cpf like '" . $cpf . "' order by p.nome

select p.cpf, p.nome, c.nome as curso, c.ch, c.inicio, c.fim, e.nome as evento, (select i.nome from instituicao i where i.id=e.instituicao_id) as local from participante p 
            join participante_tem_curso ptc on p.id=ptc.participante_id 
            join curso c on c.id=ptc.curso_id
            join evento e on e.id=ptc.evento_id where p.cpf like '046.028.433-95' order by p.nome

//Certificado completo
select p.cpf, p.nome, c.nome as curso, c.ch, c.inicio, c.fim, e.nome as evento, 
(select i.nome from instituicao i where i.id=e.instituicao_id) as local, 
(select ce.layout from certificado ce where e.id=ce.evento_id) as layout, 
(select ce.ass from certificado ce where e.id=ce.evento_id) as ass from participante p 
            join participante_tem_curso ptc on p.id=ptc.participante_id 
            join curso c on c.id=ptc.curso_id
            join evento e on e.id=ptc.evento_id where p.cpf like '046.028.433-95' and c.nome like 'BANCO DE DADOS PARA WEB' order by p.nome
			
//Verificação de digital - Módulo Desktop
select p.id, p.nome, p.f1, c.nome as curso, e.nome as evento from participante p 
            join participante_tem_curso ptc on p.id=ptc.participante_id 
            join curso c on c.id=ptc.curso_id
            join evento e on e.id=ptc.evento_id

//Presença mínima para emissão de certificado
SELECT COUNT(`hora`) FROM `ponto` WHERE `curso_id`=3 and `participante_id`=1

//Alterar CHARSET e COLLAÇÂO da tabela
ALTER TABLE `evento` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;