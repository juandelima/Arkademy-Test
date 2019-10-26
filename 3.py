def divideAndSort(number):
    number = str(number)
    split = number.split('0')
    result = []
    for i in split:
        createList = list(i)
        result += sorted(createList)
        
    return "".join(result)

if __name__ == "__main__":
    print(divideAndSort(5956560159466056))
