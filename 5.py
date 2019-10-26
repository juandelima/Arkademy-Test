def findHighestProfit(numArr):
    get_max = max(numArr)
    hari_jual = numArr.index(get_max)
    arr = []
    for hari_beli, data in enumerate(numArr):
        if hari_beli < hari_jual:
            arr += [get_max - data]

    if arr != []:
        return max(arr)
    else:
        return "Tidak bisa mendapatkan profit pada hari-hari ini"


if __name__ == "__main__":
    val = [10, 2, 11, 20, 3, 5]
    result = findHighestProfit(val)
    print(result)
