# Attendance Management System with LLM-Powered SQL Chatbot 👨‍🏫

![GitHub repo size](https://img.shields.io/github/repo-size/YUGESHKARAN/dsu)
![GitHub stars](https://img.shields.io/github/stars/YUGESHKARAN/dsu?style=social)
![GitHub forks](https://img.shields.io/github/forks/YUGESHKARAN/dsu?style=social)
![GitHub issues](https://img.shields.io/github/issues/YUGESHKARAN/dsu)
![GitHub last commit](https://img.shields.io/github/last-commit/YUGESHKARAN/dsu)
![GitHub contributors](https://img.shields.io/github/contributors/YUGESHKARAN/dsu)
![GitHub license](https://img.shields.io/github/license/YUGESHKARAN/dsu)


## Overview

This project delivers a web-based Attendance Management System designed to solve common issues in traditional systems, like inefficient faculty interfaces and the time-consuming process of analyzing and visualizing student data with SQL queries. Leveraging modern web technologies and AI, our system provides a responsive, scalable solution that enhances both usability and data management efficiency. 🌐📊

## Key Features

- **Web-Based Platform:** Runs smoothly on both desktop and standalone devices. 💻🖥️
- **Modern, Responsive UI:** Built with HTML5, SCSS, and JavaScript for an intuitive user experience. 🎨✨
- **Robust Backend:** 
  - **Server:** PHP scripting language. 🐘
  - **Database:** MySQL manages students, faculties, subjects, timetables, and attendance data. 🗄️
- **Integrated LLM-Powered SQL Chatbot:**
  - Developed in Python using Flask (backend), Langchain NLP library, and OpenAI API. 🐍🧠
  - Uses the **meta-llama/Llama-4-Scout-17B-16E-Instruct** LLM model for advanced natural language understanding. 🦙
  - Allows natural language analysis, visualization, and management of data directly from the database. 📈🔎
  - Supports operations like updating, modifying, and deleting records without writing SQL queries. ✏️🗑️
  - **Explore the Chatbot Source:** [MySQL RAG: LLM-Powered SQL Chatbot](https://github.com/YUGESHKARAN/MySQL-RAG.git)
- **Improved Data Visualization:** Enables quick analytics and reporting for informed decision-making. 📊📝

## Motivation

Traditional attendance management solutions are often hindered by:
- Poor user interfaces for faculty, especially with large datasets. 🙅‍♂️👩‍🏫
- The need to construct and run complex SQL queries for analytics, leading to inefficiency. ⏳🔢

This system addresses these challenges by integrating a natural language chatbot interface and a user-focused frontend. 🗣️💡

## Technology Stack

| Layer        | Technology                                            |
|--------------|-------------------------------------------------------|
| Frontend     | HTML5, SCSS, JavaScript                               |
| Backend      | PHP                                                   |
| Database     | MySQL                                                 |
| AI Chatbot   | Python, Flask, Langchain, OpenAI API, Llama-4-Scout   |

## Folder Structure

The project is organized for clarity and maintainability: 🗂️

- **.vscode/** – VS Code workspace settings
- **backend/** – PHP backend logic
- **config/** – Configuration files for frontend and backend
- **css/** – Stylesheets (SCSS/CSS)
- **frontend/** – Frontend code (HTML, JS)
- **images/** – Project images and assets

See the structure overview above for more detail.


## System Architecture

1. **Frontend:** Interactive user interface for attendance management and chatbot access. 🖱️
2. **Backend (PHP):** Handles business logic and database communication. 🔄
3. **Database (MySQL):** Stores all core data. 🗃️
4. **AI Chatbot (Python):**
   - Built with Flask, connects directly to the MySQL database. 🔗
   - Powered by meta-llama/Llama-4-Scout-17B-16E-Instruct for LLM reasoning. 🦙
   - Translates natural language commands into database queries and visualizations. 🤝

## Getting Started 🚀

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/YUGESHKARAN/dsu.git
    ```
2. **Set up the Database:**
    - Import the MySQL schema in `/config` or the provided SQL scripts. 🛠️
3. **Configure the Backend:**
    - Update database connection parameters in the PHP configuration files. ⚙️
4. **Run the Frontend:**
    - Serve the frontend files using a web server or development server. 🌍
5. **Launch the Chatbot:**
    - Clone and set up the chatbot from [MySQL RAG: LLM-Powered SQL Chatbot](https://github.com/YUGESHKARAN/MySQL-RAG.git)
    - Install Python dependencies from the: `requirements.txt`. 📦
    - Ensure access/configuration for the meta-llama/Llama-4-Scout-17B-16E-Instruct model.
    - Follow the instructions in the chatbot repo to run the Flask app. 🏃‍♂️

## Usage

- **Faculty/Admin:** Log in to manage attendance, view reports, or interact with the chatbot for advanced analytics and record management. 👩‍🏫👨‍💼
- **Chatbot:** Use natural language queries like:
  - "Show attendance report for April" 📅
  - "Update attendance for student John Doe in subject Mathematics" ✏️
  - "Visualize subject-wise attendance trends" 📊

## Benefits

- **Efficiency:** Automates and simplifies routine data management. ⚡
- **Accessibility:** Empowers non-technical users to analyze and manage data without SQL knowledge. 👐
- **Scalability:** Suitable for institutions of any size. 🏢🏫

## Contributing

We welcome contributions! Open an issue or pull request for suggestions, improvements, or bug fixes. 🤝

## Contact

For questions or support, contact [Yugeshkaran](https://github.com/YUGESHKARAN). 📬
