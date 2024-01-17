--RESUMO - INNER JOIN

--Combina dados de várias tabelas
--Permite a junção entre duas ou mais tabelas, desde que haja entrelaçamento entre todas
--Pensando na teoria de conjuntos, é a interseção entre dois conjuntos

--Exemplo:
SELECT
    P.nome,
    P.preco,
    C.nome as Categoria
FROM
    produto P
INNER JOIN
    categoria_produto C
ON P.id_categoria = C.id;

--Exemplo - Várias tabelas: 
SELECT
    P.nome,
    P.preco,
    C.nome as Categoria,
    COUNT(V.id_produto) TOTAL_VENDIDOS
FROM
    produto P
INNER JOIN
  categoria_produto C
ON P.id_categoria = C.id
INNER JOIN
  venda_produto V
ON V.id_produto = P.id
GROUP BY P.id;
