from flask import Flask, render_template, url_for
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///site.db'
db = SQLAlchemy(app)

class Battery(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    batt_1 = db.Column(db.Integer, nullable=False)
    batt_2 = db.Column(db.Integer, nullable=False)
    batt_3 = db.Column(db.Integer, nullable=False)
    batt_4 = db.Column(db.Integer, nullable=False)
    batt_5 = db.Column(db.Integer, nullable=False)
    batt_6 = db.Column(db.Integer, nullable=False)

    def __repr__(self):
        return f"Battery('{self.batt_1}','{self.batt_2}','{self.batt_3}', '{self.batt_4}','{self.batt_5}','{self.batt_6}')"


@app.route("/")
def hello_world():
    return render_template("home.html", Battery = Battery.query.first())

if __name__ == '__main__':
    app.run(debug=True)
