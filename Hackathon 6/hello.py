from flask import Flask
from flask import render_template

app = Flask(__name__)


@app.route('/hello/')
@app.route('/hello/<name>')
def hello2(name=None):
    return render_template('hellot.html', name=name)

@app.route("/")
def hello():
    return render_template('basic.html');

if __name__ == "__main__":
    app.run(debug=True)
