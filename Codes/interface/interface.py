import sys
from PyQt5.QtWidgets import QApplication, QWidget, QLabel, QLineEdit, QPushButton, QVBoxLayout, QHBoxLayout

class LoginWindow(QWidget):
    def __init__(self):
        super().__init__()

        self.init_ui()

    def init_ui(self):
        # Set window properties
        self.setWindowTitle("Login Interface")
        self.setGeometry(400, 230, 600, 400)
        self.setStyleSheet("background-color: #2c3e50;")
    
        # Widgets
        self.welcome_label = QLabel("Welcome", self)
        self.welcome_label.setStyleSheet("color: white; font-size: 24px; font-weight: bold;")
        
        self.username_label = QLabel("Username:", self)
        self.username_label.setStyleSheet("color: white; font-size: 16px;")

        self.username_entry = QLineEdit(self)
        self.username_entry.setStyleSheet("background-color: #34495e; color: white; font-size: 14px; padding: 8px; border-radius: 5px;")

        self.password_label = QLabel("Password:", self)
        self.password_label.setStyleSheet("color: white; font-size: 16px;")

        self.password_entry = QLineEdit(self)
        self.password_entry.setEchoMode(QLineEdit.Password)
        self.password_entry.setStyleSheet("background-color: #34495e; color: white; font-size: 14px; padding: 8px; border-radius: 5px;")

        self.login_button = QPushButton("Login", self)
        self.login_button.setStyleSheet("background-color: #F5C100; color: white; font-size: 16px; padding: 10px; border-radius: 5px;")

        # Layout
        layout = QVBoxLayout()
        
        # Add the welcome label to a horizontal layout to center it
        welcome_layout = QHBoxLayout()
        welcome_layout.addStretch()
        welcome_layout.addWidget(self.welcome_label)
        welcome_layout.addStretch()
        layout.addLayout(welcome_layout)
        
        layout.addWidget(self.username_label)
        layout.addWidget(self.username_entry)
        layout.addWidget(self.password_label)
        layout.addWidget(self.password_entry)
        layout.addWidget(self.login_button)

        self.setLayout(layout)

        self.show()

if __name__ == "__main__":
    app = QApplication(sys.argv)
    window = LoginWindow()
    sys.exit(app.exec_())
