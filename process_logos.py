import os
from PIL import Image

dir_path = "public/images/Sponsor Vol I"
for filename in os.listdir(dir_path):
    if filename.endswith(".png"):
        filepath = os.path.join(dir_path, filename)
        try:
            img = Image.open(filepath)
            img = img.convert("RGBA")
            datas = img.getdata()
            
            newData = []
            # Make white (and near white) pixels transparent
            for item in datas:
                if item[0] > 240 and item[1] > 240 and item[2] > 240:
                    newData.append((255, 255, 255, 0))
                else:
                    newData.append(item)
                    
            img.putdata(newData)
            img.save(filepath, "PNG")
            print(f"Processed: {filename}")
        except Exception as e:
            print(f"Error processing {filename}: {e}")
