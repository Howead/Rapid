from flask import Flask
from flask import render_template
from flask_sqlalchemy import SQLAlchemy
from jinja2 import Template

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:////tmp/test.db'
db = SQLAlchemy(app)



class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True)
    email = db.Column(db.String(120), unique=True)

    def __init__(self, username, email):
        self.username = username
        self.email = email

    def __repr__(self):
        return 'User:{user}, Email:{email}'.format(user=self.username,email=self.email)
template = Template('Hello {{ users }}!')

@app.route('/users/')
def hello2(users=None):
    return render_template('usert.html', users=User.query.all())

if __name__ == "__main__":
    app.run(debug=True)