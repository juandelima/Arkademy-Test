import re
from string import ascii_lowercase as al

def is_name_valid(name):
    validate = bool(re.search('[A-Z]{3}$', name))
    return validate


def is_age_valid(age):
    validate = bool(re.search(r"\d{2}", str(age)))
    return validate

def is_username_valid(username):
    string = ""
    number = ""
    simbol = ""
    is_int = [str(i) for i in range(0, 10)]
    
    for i in username:
        if i in al:
            string += i
        elif i in is_int:
            number += i
        else:
            simbol += i
    if len(number) == 3:
        validate = bool(re.search("[a-z]{4}$", string)) and bool(re.search("[_.]$", simbol)) and bool(re.search(r"\d{3}", number))
    else:
        return False
    
    return validate


if __name__ == '__main__':
    data = {
        'name': "JUAN",
        'age': 23,
        'username': 'juan_12' 
    }

    print(is_name_valid(data['name']))
    print(is_age_valid(data['age']))
    print(is_username_valid(data['username']))
