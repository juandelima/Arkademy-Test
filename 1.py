import json

def biodata(name, age):
    data = {
        "name" : name,
        "age": age,
        "address": "Kec.Setu, Bekasi, Jawabarat",
        "hobbies": ["Playing Piano", "Playing Guitar"],
        "is_married": False,
        "list_school": [
            {
                "SMA N 1 SETU": {
                    "year_in": 2012,
                    "year_out": 2015,
                    "major": "Science"
                },
                
                "Universitas Gunadarma": {
                    "year_in": 2015,
                    "year_out": 2019,
                    "major": "Teknik Informatika"
                }
            }
        ],
        
        "skills": [
            {
                "Python": {
                    "level": "Beginner",
                },
                
                "Php": {
                    "level": "Beginner"
                }
            }
        ],

        "interest_in_coding": True
    }
    return json.dumps(data, indent = 2)


if __name__ == "__main__":
    name = "Juan Valerian Delima"
    age = 23
    get_biodata = biodata(name, age)
    print(get_biodata)
