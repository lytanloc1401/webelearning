from collections import defaultdict
from heapq import *

def dijkstra(edges, a, b):

    e = defaultdict(list)
    for l,r,c in edges:
        e[l].append((c,r))
    q, seen, mins = [(0,a,())], set(), {a: 0}
    while q:
        (cost,v1,path) = heappop(q)
        if v1 not in seen:
            seen.add(v1)
            path = (v1, path)
            if v1 == b: return (cost, path)

            for c, v2 in e.get(v1, ()):
                if v2 in seen: continue
                prev = mins.get(v2, None)
                next = cost + c
                if prev is None or next < prev:
                    mins[v2] = next
                    heappush(q, (next, v2, path))
    return 0


if __name__ == "__main__":
    edges = [
        ("A", "B", 2),
        ("A", "D", 7),
        ("B", "C", 3),
        ("B", "D", 8),
        ("B", "E", 9),
        ("C", "F", 4),
        ("F", "E", 5),
        ("E", "D", 6),
    ]

    print ('Dijkstra')
    print (edges)
    print ('A -> E:')
    print (dijkstra(edges, 'A', 'E'))