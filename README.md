# 📝 Micro-Blog Project - Relatório de Desenvolvimento

Este documento detalha o estado atual do projeto de Micro-Blog desenvolvido como parte dos estudos de **Análise e Desenvolvimento de Sistemas**, focando na integração de tecnologias Full Stack e persistência de dados.

---

## 🚀 Tecnologias Utilizadas
* **Frontend:** HTML5, CSS3 (Custom Dark Mode) e JavaScript Assíncrono (Fetch API).
* **Backend:** PHP 8.x.
* **Banco de Dados:** MySQL (MariaDB).
* **Arquitetura:** Padrão MVC simplificado para separação de responsabilidades (Model, View, Controller).

---

## 🛠️ O que foi implementado até agora (CRUD Completo)
Concluímos o ciclo básico de manipulação de dados, permitindo que o sistema execute as quatro operações fundamentais:

1. **Create (Criar):** Interface para envio de postagens via formulário, processadas por `salvar_post.php` e inseridas no banco de dados.
2. **Read (Ler):** Renderização dinâmica de postagens existentes no MySQL através de requisições `GET` interceptadas pelo JavaScript.
3. **Update (Editar):** Lógica para recuperar dados de uma postagem específica, preencher o formulário automaticamente e salvar as alterações no banco (`editar_post.php`).
4. **Delete (Excluir):** Funcionalidade de remoção permanente de registros com confirmação de segurança no frontend e execução via `excluir_post.php`.

---

## ⚠️ Status Atual e Pendências Técnicas

### 1. O Problema de Comunicação (JS/SQL)
Atualmente, o projeto apresenta uma instabilidade na camada de comunicação entre o Frontend e o Backend. Embora o arquivo `script.js` esteja tecnicamente correto e acessível via URL direta, o navegador parou de executar as funções de carregamento automático (`buscarPosts`).
* **Sintoma:** O Console do desenvolvedor permanece limpo, indicando que o script não está sendo disparado pelo HTML, possivelmente devido a um erro de cache persistente ou falha de vínculo no ambiente local (XAMPP/Apache).
* **Impacto:** As postagens não aparecem na tela no momento do carregamento da página, travando a interação imediata do usuário com os dados do MySQL.

### 2. Segurança (Próxima Fase - Foco em Cybersecurity)
Como o foco futuro é a pós-graduação em **Cybersecurity**, o projeto ainda carece de camadas críticas de proteção:
* **Autenticação:** Sistema de login robusto utilizando `password_hash` e proteção de sessões (`session_start`).
* **Sanitização de Dados:** Implementação de filtros para prevenir ataques de SQL Injection e XSS (Cross-Site Scripting).
* **Controle de Acesso:** Lógica para garantir que um usuário autenticado só possa manipular seus próprios registros.

---

## 📅 Conclusão e Plano de Continuidade
O projeto atingiu a maturidade de um **MVP (Produto Mínimo Viável)** funcional no backend, porém o desenvolvimento foi pausado para reavaliação da infraestrutura de carregamento de scripts.

**Próximos Passos Planejados:**
1. Estabilizar o carregamento do JavaScript no DOM.
2. Implementar a tabela de usuários com criptografia.
3. Refinar a experiência do usuário (UX) com notificações de sucesso/erro.

---

> **Desenvolvedor:** Vinicius Oliveira Silva  
> **Data do Relatório:** 04 de Abril de 2026