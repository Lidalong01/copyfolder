	//利用递归拷贝一个文件夹，这是用一个个方法封装的，方法内第一个形参对象为要复制的文件夹地址，第二个为需要复制文件到那个地址
  
  private void CopyMothod(File file,File file2){
	
		try{
			int leng = -1;//是否读取文件内容完毕
		
			if(file.exists() &&file!=null){
//				是文件夹就创建，然后递归
				
				if(file.isDirectory()){
//					因为只要是文件夹了，进来了,先用遍历的File对象创建文件夹(遍历结果可能是文件)，然后再递归查找，所以出现了问件名字相同的文件夹的里面
					for(File copy:file.listFiles()){
						File path = new File(file2.getAbsolutePath(),copy.getName());
//				如果遍历后是文件了，就在递归使文件复制		
						if(copy.isFile()){
							qiao(copy,path);
						}else if(copy.isDirectory()){
							System.out.println(path.mkdirs());
							qiao(copy,path);
						}
						
						
					}	
						
				}else{
					num+= file.length();
//					是文件就复制,file和file2是遍历后发现是文件，传进来的，所以输入输出流直接拿来用就行
					input = new BufferedInputStream(new FileInputStream(file));
//					因为文件夹遍历的结果如果是文件，他会自动过滤，重新执行一次该方法，而不是创建文件夹，
//					而遍历的时候File路径里面是这个文件，而不是文件夹，所以直接用绝对路径，后缀名是已经遍历好的，不需要再取一遍
					uo = new BufferedOutputStream(new FileOutputStream(file2));
					byte[] by_copy = new byte[1024];
					while((leng = input.read(by_copy))!=-1){
						uo.write(by_copy, 0, leng);
						uo.flush();
					}
					uo.close();
					System.out.println("关闭输出");
				}
				
			}else{
//				如果文件件夹里读取到文件，那也是存在的，所以当File对象内的路径不存在时，才执行1这个
				System.out.println("该文件不存在");
			}
		
		}catch(Exception ex){
			ex.getStackTrace();
		}finally{
			if(input!=null ){
				try {
					input.close();
					System.out.println("关闭输入");
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		
		}
	
	}
