import java.io.IOException;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;



public class ripExample 
{

	public static void main(String args[]) throws IOException
	{
		Document doc = Jsoup.connect("http://google.com/").get();

		String html = "<p>An <a href='http://example.com/'><b>example</b></a> link.</p>";
		//Document doc = Jsoup.parse(html);
		Element link = doc.select("a").first();

		String text = doc.body().text(); // "An example link"
		String linkHref = link.attr("span"); // "http://example.com/"
		String linkText = link.text(); // "example""

		String linkOuterH = link.outerHtml(); 
		    // "<a href="http://example.com"><b>example</b></a>"
		String linkInnerH = link.html(); // "<b>example</b>"
		
		System.out.print(linkText);
	}
	
}
