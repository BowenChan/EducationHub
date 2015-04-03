import java.io.IOException;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;



public class ripExample 
{

	public static void main(String args[]) throws IOException
	{
		Document doc = Jsoup.connect("https://phet.colorado.edu/en/simulation/forces-and-motion-basics").get();

		Element element = doc.select("head").first();
	
		String text = doc.body().text(); // "An example link"
		String linkHref = element.attr("title"); // "http://example.com/"
		String linkText = element.text(); // "example""

		System.out.println(linkText);
		
		Elements elements = doc.select("meta");
		
		
		String str = "";
		for(int i =0; i < elements.size(); i++)
		{
			if(elements.get(i).attr("name").contains("description"))
			{
				 str = elements.get(i).attr("content");
			}
		}
		//text = doc.body().text(); // "An example link"
		
		//linkText = element.text(); 
		System.out.println(str);
		
	}
	
}
