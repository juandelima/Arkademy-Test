def arrayTransformation(array):
    new_array = []
    for i in range(len(array)):
        new_array.append({"name": array[i]["name"], "info": array[i]["info"]})
        for j in range(len(array[i]["data"])):
            new_array.append(array[i]["data"][j])
            
    for i in new_array:
        print(i)

if __name__ == "__main__":
    array = [
      {
        "name": "Movies", "info": "category_name",
        "data": [
          {"name": "Interstellar", "info": "category_data"},
          {"name": "Dark Knight", "info": "category_data"},
        ]
      },
      {
        "name": "Music", "info": "category_name",
        "data": [
          { "name": "Adams", "info": "category_data" },
          { "name": "Nirvana", "info": "category_data" },
        ]
      }
    ]

    result = arrayTransformation(array)

