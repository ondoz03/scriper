# open the file in write mode
# def generate(length=3):
#     small = [chr(ord('d') + i) for i in range(22)]

#     if length <= 0:
#         return []
#     elif length == 1:
#         return small.copy()
#     else:
#         result = []
#         for letter in small:
#             for subLetter in generate(length - 1):
#                 result.append(letter + subLetter)

#         return result

# # Example usage:
# generated_strings = generate(3)
# print(generated_strings)

def generate_text(length: int):
    small = [chr(ord('a') + i) for i in range(26)]
    if length <= 0:
        return []
    elif length == 1:
        return small.copy()
    else:
        result = []
        for letter in small:
            for subLetter in generate_text(length - 1):
                result.append(letter + subLetter)
        return result

def resolve_range(start, end):
    result = []
    for length in range(len(start), len(end) + 1):
        result.extend(generate_text(length))

    return [string for string in result if start <= string <= end]

start = 'fka'
end = 'zzz'

resolved_strings = resolve_range(start, end)

for string in resolved_strings:
    print(string)
