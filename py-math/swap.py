buffer = []


def swap(arr, curr=0, cnt=0):
    """

    :param arr:
    :type arr: list
    :param curr: index of current
    :type curr: int
    :param cnt:
    :type cnt: int
    :return:
    """
    _lim = len(arr) - 1

    for to in range(curr, _lim + 1):
        _arr = arr[:]
        if to != curr:
            _arr[curr], _arr[to] = _arr[to], _arr[curr]
            cnt += 1
        if curr == _lim:
            fnd = False
            for _a, _c in buffer:
                if _a == _arr and _c > cnt:
                    _c = cnt
                    fnd = True
                    break
            if not fnd:
                buffer.append((_arr[:], cnt))
        else:
            swap(_arr, curr + 1, cnt)


if __name__ == '__main__':
    swap([1, 2, 3, 4])
    print(len(buffer))
    print(buffer)

